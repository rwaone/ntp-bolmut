import React from "react";
import { Button, Form, Modal, Popconfirm, message } from "antd";
import styles from "../Document.module.css";
import { useEffect, useState } from "react";

import HargaKomoditas from "../../../components/Row/HargaKomoditas";
import AddSection from "./AddSection";
import RupiahInput from "../../../components/RupiahInput";
import axios from "axios";
import {
    ArrowDownOutlined,
    ArrowUpOutlined,
    DeleteOutlined,
    PlusOutlined,
} from "@ant-design/icons";

const Section = ({ id, title, groups, response_id, form, qualityChanges }) => {
    const [qualities, setQualities] = useState([]);
    const [open, setOpen] = useState(false);
    const [confirmLoading, setConfirmLoading] = useState(false);
    const [changes, setChanges] = useState([]);

    const [messageApi, contextHolder] = message.useMessage();
    const submitAddQuality = async () => {
        try {
            setOpen(false);
        } catch (error) {}
    };

    // Update status based on form values
    const handleValuesChange = (_, allValues) => {
        const newStatus = qualities.reduce((acc, quality) => {
            const prevPrice = allValues[`${quality.id}-price-prev`];
            const currentPrice = allValues[`${quality.id}-price`];
            let changes = calculateChanges(currentPrice, prevPrice);
            acc[quality.id] = changes;
            return acc;
        }, {});
        setChanges(newStatus);
    };
    const calculateChanges = (harga, hargaSebelum) => {
        if (hargaSebelum > 0) {
            const perubahan = harga - hargaSebelum;
            const persen =
                Math.round((Math.abs(perubahan) / hargaSebelum) * 10000) / 100;
            if (perubahan == 0) return "0 %";
            if (perubahan > 0)
                return (
                    <>
                        <ArrowUpOutlined color="green" /> {persen} %
                    </>
                );
            return (
                <>
                    <ArrowDownOutlined /> {persen} %
                </>
            );
        }
        return "";
    };
    const confirmAddQuality = async (values, section_id) => {
        // console.log({ values, response_id });
        try {
            messageApi.open({
                type: "loading",
                content: "Menambahkan Kualitas",
                key: "kualitas-add",
            });
            const response = await axios.post(
                "/data",
                {
                    ...values,
                    response_id,
                    price: 0,
                },
                { headers: { "Content-Type": "application/json" } }
            );
            messageApi.open({
                type: "success",
                content: "Berhasil menambahkan Kualitas",
                key: "kualitas-add",
            });
        } catch (error) {
            // console.log({ status: error.response.status });
            let message = error;
            if (error.response.status === 409) {
                message = "Data sudah ada !";
            }
            messageApi.open({
                type: "error",
                content: message,
                key: "kualitas-add",
            });
        } finally {
            fetchQualities(section_id);
        }
    };
    const confirmDeleteQuality = async (id, section_id) => {
        // console.log({ values, response_id });
        try {
            messageApi.open({
                type: "loading",
                content: "Menghapus data",
                key: "kualitas-delete",
            });
            const response = await axios.delete(`/data/${id}`);
            messageApi.open({
                type: "success",
                content: "Berhasil menambahkan Kualitas",
                key: "kualitas-delete",
            });
        } catch (error) {
            // console.log({ status: error.response.status });
            let message = error;

            messageApi.open({
                type: "error",
                content: message,
                key: "kualitas-delete",
            });
        } finally {
            fetchQualities(section_id);
        }
    };
    const fetchQualities = async (section_id) => {
        try {
            //start loading
            const { data } = await axios.get("/api/data", {
                params: { section_id: section_id },
            });
            setQualities(data);
        } catch (error) {
        } finally {
            //finish loading
        }
    };
    useEffect(() => {
        fetchQualities(id);
    }, []);

    return (
        <React.Fragment>
            {contextHolder}
            <Modal
                title="Master Kualitas"
                open={open}
                onOk={submitAddQuality}
                confirmLoading={confirmLoading}
                onCancel={() => setOpen(false)}
                width={1000}
            >
                <AddSection sectionId={id} confirm={confirmAddQuality} />
            </Modal>
            <div>
                <Button
                    type="primary"
                    className={styles.button}
                    onClick={() => setOpen(true)}
                    icon={<PlusOutlined />}
                >
                    Tambah Kualitas
                </Button>

                <table className={styles.table}>
                    <thead>
                        <tr className={styles.row}>
                            <td colSpan={8} className={styles.title}>
                                {title}
                            </td>
                        </tr>
                        <tr>
                            <td
                                className={`${styles.data_center} min-w-[300px]`}
                            >
                                Nama Barang/Jasa
                            </td>
                            <td
                                className={`${styles.data_center} min-w-[300px]`}
                            >
                                Kualitas
                            </td>
                            <td className={`${styles.data_center}`}>Satuan</td>
                            <td className={`${styles.data_center}`}>
                                Kode Kualitas
                            </td>
                            <td className={`${styles.data_center}`}>
                                Harga Bulan Pencacahan (Rp)
                            </td>
                            <td className={`${styles.data_center}`}>
                                Harga Bulan Sebelumnya (Rp)
                            </td>
                            <td
                                className={`${styles.data_center} max-w-[20px]`}
                            >
                                Perubahan (%)
                            </td>
                            <td className={`${styles.data_center}`}>Hapus</td>
                        </tr>
                        <tr>
                            <td
                                className={`${styles.data_center} min-w-[300px]`}
                            >
                                (1)
                            </td>
                            <td
                                className={`${styles.data_center} min-w-[300px]`}
                            >
                                (2)
                            </td>
                            <td className={`${styles.data_center}`}>(3)</td>
                            <td className={`${styles.data_center}`}>(4)</td>
                            <td className={`${styles.data_center}`}>(5)</td>
                            <td className={`${styles.data_center}`}>(6)</td>
                            <td
                                className={`${styles.data_center} max-w-[20px]`}
                            >
                                (7)
                            </td>
                            <td className={`${styles.data_center}`}>(8)</td>
                        </tr>
                    </thead>
                    <tbody>
                        {groups.map((group) => (
                            <React.Fragment key={group.id}>
                                <tr>
                                    <td className={styles.group} colSpan={8}>
                                        {group.name}
                                    </td>
                                </tr>
                                {qualities
                                    .filter(
                                        (quality) =>
                                            quality.group_id === group.id
                                    )
                                    .map((quality) => (
                                        <tr>
                                            <td className={styles.data}>
                                                {quality.commodity_name}
                                            </td>
                                            <td className={styles.data}>
                                                {quality.quality_name}
                                            </td>
                                            <td className={styles.data}>
                                                {quality.satuan}
                                            </td>
                                            <td className={styles.data}>
                                                {quality.quality_code}
                                            </td>
                                            <td className={styles.data_right}>
                                                <RupiahInput
                                                    className={styles.form_item}
                                                    key={`rupiah-${quality.id}`}
                                                    inputName={`${quality.id}-price`}
                                                    initialValue={quality.price}
                                                />
                                            </td>
                                            <td className={styles.data_right}>
                                                <RupiahInput
                                                    className={styles.form_item}
                                                    inputName={`${quality.id}-price-prev`}
                                                    key={`prev-rupiah-${quality.id}`}
                                                    readOnly
                                                    initialValue={0}
                                                />
                                            </td>
                                            <td className={styles.data_right}>
                                                {qualityChanges[quality.id]}
                                            </td>

                                            <td className={styles.data_center}>
                                                <Popconfirm
                                                    title="Apakah anda yakin ingin menghapus"
                                                    onConfirm={() =>
                                                        confirmDeleteQuality(
                                                            quality.id,
                                                            id
                                                        )
                                                    }
                                                >
                                                    <DeleteOutlined />
                                                </Popconfirm>
                                            </td>
                                        </tr>
                                    ))}
                            </React.Fragment>
                        ))}
                    </tbody>
                </table>
            </div>
        </React.Fragment>
    );
};

export default Section;
