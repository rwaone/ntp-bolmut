import { Button, Form, Tabs } from "antd";
import Blok3 from "./Blok3/Blok3";
import Blok4 from "./Blok4/Blok4";
import Blok5 from "./Blok5/Blok5";
import Tab1 from "./Tab1/Tab1";
import Tab5 from "./Tab5/Tab5";
import Status from "../../components/Status";
import styles from "./Document.module.css";
import { useEffect, useState } from "react";
import Section from "./Section/Section";

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
    sample,
    document,
    sections,
    groups,
    commodities,
    qualities,
    selectedQualities,
    previousPrices,
}) => {
    console.log({ sections });
    const [form] = Form.useForm();

    const [blok1, setBlok1] = useState({});
    const [blok2, setBlok2] = useState({});

    useEffect(() => {
        // setBlok1({
        //     bulan: response.month,
        //     tahun: response.year,
        //     provinsi: response.provinsi,
        //     kode_provinsi: response.kode_provinsi,
        //     kabkot: response.kabkot,
        //     kode_kabkot: response.kode_kabkot,
        //     kecamatan: response.kecamatan,
        //     kode_kecamatan: response.kode_kecamatan,
        // });
        setBlok1({
            bulan: "Januari",
            tahun: 2024,
            provinsi: "SULAWESI UTARA",
            kode_provinsi: "71",
            kabkot: "MANADO",
            kode_kabkot: "71",
            kecamatan: "WANEA",
            kode_kecamatan: "031",
            desa: "Kelurahan WANEA",
            kode_desa: "031",
            respondent_name: sample.respondent_name,
        });
        setBlok2({
            petugas_nip: "",
            pemeriksa_nip: "",
        });
        // console.log({ blok1, blok2 });
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
            children: <Blok3 />,
        },
        ...sections.map((section) => ({
            key: section.name,
            label: section.name,
            children: (
                <Section
                    id={section.id}
                    title={section.name}
                    groups={groups.filter(
                        (group) => group.section_id == section.id
                    )}
                />
            ),
        })),
        {
            key: "5",
            label: "Blok VI-VII",
            children: <Tab5 form={form} />,
        },
    ];

    const onFinish = (values) => {
        console.log({ values });
    };
    return (
        <div>
            <Button
                type="primary"
                onClick={() => {
                    form.submit();
                }}
            >
                Simpan
            </Button>
            <Form form={form} onFinish={onFinish}>
                <Tabs items={tabs} className={styles.body} />
            </Form>
            <Status status="error" />
        </div>
    );
};

export default Edit;
