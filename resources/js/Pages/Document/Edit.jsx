import {
    Badge,
    Button,
    Form,
    Modal,
    Space,
    Tabs,
    message,
    Table,
    Input,
    Spin,
} from "antd";
import Blok3 from "./Blok3/Blok3";
import Blok4 from "./Blok4/Blok4";
import Blok5 from "./Blok5/Blok5";
import Tab1 from "./Tab1/Tab1";
import Tab5 from "./Tab5/Tab5";
import Status from "../../components/Status";
import styles from "./Document.module.css";
import { useEffect, useState } from "react";
import Section from "./Section/Section";
import {
    ArrowDownOutlined,
    ArrowLeftOutlined,
    ArrowUpOutlined,
    CheckOutlined,
    SaveOutlined,
    ReloadOutlined,
} from "@ant-design/icons";
import axios from "axios";
import dayjs from "dayjs";
import { router } from "@inertiajs/react";

const blok1 = {
    bulan: "Januari",
    tahun: 2024,
    provinsi: "SULAWESI UTARA",
    kode_provinsi: "71",
    kabkot: "MANADO",
    kode_kabkot: "71",
    kecamatan: "WANEA",
    kode_kecamatan: "031",
};

const Edit = ({
    response,
    blok1,
    sample,
    document,
    sections,
    groups,
    commodities,
    qualities,
    selectedQualities,
    previousPrices,
}) => {
    // console.log({ response });
    const [form] = Form.useForm();

    const [messageApi, contextHolder] = message.useMessage();

    // const [blok1, setBlok1] = useState({});
    const [blok2, setBlok2] = useState({});
    const [qualityChanges, setQualityChanges] = useState({});
    const [openRevalModal, setOpenRevalModal] = useState(false);
    const [revalLoading, setRevalLoading] = useState(false);
    const [isOpen, setIsOpen] = useState(false);

    const [errorList, setErrorList] = useState([]);
    const [warningList, setWarningList] = useState([]);

    const errorColumns = [
        {
            title: "Nomor",
            dataIndex: "nomor",
            key: "nomor",
            width: 15,
            render: (text, record, index) => index + 1,
        },
        {
            title: "Variabel",
            dataIndex: "variable",
            key: "variable",
            // render: (_: any, record: any) => record.variable,
        },
        {
            title: "Deskripsi",
            dataIndex: "rincian",
            key: "rincian",
            // render: (text: string) => (
            //     <TextRupiah color="#000" value={Number(text)} />
            // ),
        },
    ];

    useEffect(() => {
        console.log({ qualities });
        blok1["respondent_name"] = sample.respondent_name;
        setBlok2({
            petugas_nip: "",
            pemeriksa_nip: "",
        });
        form.setFieldsValue({
            respondent_name: sample.respondent_name,
            commodities: response.commodities,
            notes: response.notes,

            response_id: response.id,
            petugas_id: response.petugas_id,
            pengawas_id: response.pengawas_id,
            enumeration_date: dayjs(new Date(response.enumeration_date)),
            review_date: dayjs(new Date(response.review_date)),
        });
        // console.log({ qualities });
    }, []);

    const tabs = [
        {
            key: "1",
            label: "Blok I - II",
            children: <Tab1 blok1={blok1} blok2={blok2} />,
        },
        {
            key: "2",
            label: "Blok III",
            children: <Blok3 qualities={qualities} />,
        },
        ...sections.map((section) => ({
            key: section.name,
            label: section.name,
            children: (
                <Section
                    id={section.id}
                    title={section.name}
                    qualities={qualities.filter(
                        (quality) =>
                            quality.commodity.group.section_id === section.id
                    )}
                    groups={groups.filter(
                        (group) => group.section_id == section.id
                    )}
                    response_id={response.id}
                    qualityChanges={qualityChanges}
                />
            ),
        })),
        {
            key: "5",
            label: "Blok VI-VII",
            children: (
                <Tab5
                    respondent_name={sample.respondent_name}
                    nama_desa={blok1.nama_desa}
                />
            ),
        },
    ];

    const onFinish = async (values) => {
        // filter previous prices
        const filteredValues = Object.fromEntries(
            Object.entries(values).filter(([key]) => !key.includes("prev"))
        );

        try {
            messageApi.open({
                type: "loading",
                content: "Menyimpan Dokumen...",
                key: "document-save",
            });
            const response = await axios.patch(
                `/responses/${values.response_id}`,
                filteredValues,
                {
                    headers: { "Content-Type": "application/json" },
                }
            );
            messageApi.open({
                type: "success",
                content: "Berhasil menyimpan dokumen",
                key: "document-save",
            });
        } catch (error) {
            // console.log({ error });
            messageApi.open({
                type: "error",
                content: "An error occurred while saving",
                key: "document-save",
            });
        } finally {
            router.get(
                "/responses/edit/" + values.response_id,
                {},
                {
                    preserveState: true,
                    only: ["qualities"],
                }
            );
        }
    };
    const handleValuesChange = (_, allValues) => {
        // calculate quality changes
        const newChanges = qualities.reduce((acc, quality) => {
            const prevPrice = allValues[`${quality.id}-price-prev`];
            const currentPrice = allValues[`${quality.id}-price`];
            let changes = calculateChanges(currentPrice, prevPrice);
            acc[quality.id] = changes;
            return acc;
        }, {});
        setQualityChanges(newChanges);
    };
    const calculateChanges = (harga, hargaSebelum) => {
        if (hargaSebelum > 0) {
            const perubahan = harga - hargaSebelum;
            const persen =
                Math.round((Math.abs(perubahan) / hargaSebelum) * 10000) / 100;
            if (perubahan == 0) return "= 0%";
            if (perubahan > 0)
                return (
                    <>
                        <ArrowUpOutlined className={styles.icon_green} />{" "}
                        {persen} %
                    </>
                );
            return (
                <>
                    <ArrowDownOutlined className={styles.icon_red} /> {persen} %
                </>
            );
        }
        return "";
    };
    const Revalidasi = async (form, response_id) => {
        await form.submit();

        try {
            setRevalLoading(true);
            const { data } = await axios.get(
                `/response/revalidasi/${response_id}`
            );

            // setWarningRHList([...data.evaluasi_rh]);
            setErrorList([...data.daftar_error]);
            setWarningList([...data.daftar_warning]);

            messageApi.open({
                content: "Revalidasi selesai",
                type: "success",
                key: "revalidasi",
            });
        } catch (error) {
            console.error("Error submitting forms:", error);
            // Handle error if any of the forms fails to submit
        } finally {
            setRevalLoading(false);
        }
    };
    return (
        <Spin spinning={revalLoading} tip="memuat data...">
            <div>
                {contextHolder}
                <Space
                    style={{ width: "100%", justifyContent: "space-between" }}
                    direction="horizontal"
                >
                    <Space>
                        <Button>
                            <a href="/responses/index">
                                <ArrowLeftOutlined /> Kembali
                            </a>
                        </Button>
                    </Space>
                    <Space>
                        <Button
                            type="primary"
                            className={styles.button}
                            onClick={() => {
                                form.submit();
                                // console.log("xxxx");
                            }}
                        >
                            <SaveOutlined /> Simpan
                        </Button>
                        <Button
                            type="primary"
                            style={{ backgroundColor: "#e64d00" }}
                            onClick={async () => {
                                setRevalLoading(true);
                                setOpenRevalModal(true);

                                handleValuesChange("", form.getFieldsValue());
                                setIsOpen(true);

                                setRevalLoading(false);
                            }}
                        >
                            {/* <ContainerOutline /> */}
                            <CheckOutlined />
                            Evaluasi
                        </Button>
                    </Space>
                </Space>
                <Form
                    form={form}
                    onFinish={onFinish}
                    // onValuesChange={handleValuesChange}
                >
                    <Form.Item name="response_id" hidden>
                        <Input readOnly />
                    </Form.Item>
                    <Tabs items={tabs} className={styles.body} />
                </Form>
                <Status status="error" />
            </div>
            <Modal
                loading={revalLoading}
                cancelText="Tutup"
                okText=""
                onCancel={() => setOpenRevalModal(false)}
                open={openRevalModal}
                onOk={() => setOpenRevalModal(false)}
                title="Daftar Evaluasi"
                key={"range-harga-modal"}
                width="1200px"
            >
                <Space
                    style={{
                        marginBottom: "20px",
                        width: "100%",
                        justifyContent: "end",
                    }}
                >
                    <Button type="primary" onClick={Revalidasi}>
                        <ReloadOutlined /> Revalidasi
                    </Button>
                    <p>Klik ini untuk melakukan revalidasi ulang</p>
                </Space>

                <Space style={{ width: "100%" }} direction="vertical">
                    <Tabs
                        type="card"
                        items={[
                            {
                                label: (
                                    <Badge count={errorList.length}>
                                        Error Isian
                                    </Badge>
                                ),
                                key: "1",
                                children: (
                                    <>
                                        <Space>
                                            Jumlah error : {errorList.length}
                                        </Space>
                                        <Table
                                            bordered
                                            columns={errorColumns}
                                            dataSource={errorList}
                                            style={{ width: "100%" }}
                                        />
                                    </>
                                ),
                            },
                            {
                                label: (
                                    <Badge
                                        count={warningList.length}
                                        color="rgb(255, 204, 0)"
                                    >
                                        Warning Isian
                                    </Badge>
                                ),
                                key: "2",
                                children: (
                                    <>
                                        <Space>
                                            Jumlah warning :{" "}
                                            {warningList.length}
                                        </Space>
                                        <Table
                                            bordered
                                            columns={errorColumns}
                                            dataSource={warningList}
                                            style={{ width: "100%" }}
                                        />
                                    </>
                                ),
                            },
                        ]}
                    />
                </Space>
            </Modal>
        </Spin>
    );
};

export default Edit;
