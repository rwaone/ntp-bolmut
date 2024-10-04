import React from "react";
import { Button, Form, Modal, Popconfirm, Spin, message } from "antd";
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

const Section = ({
    id,
    title,
    groups,
    response_id,
    qualities,
    qualityChanges,
}) => {
    // const [qualities, setQualities] = useState([]);
    const [open, setOpen] = useState(false);
    const [confirmLoading, setConfirmLoading] = useState(false);
    const [changes, setChanges] = useState([]);
    const [DataLoading, setDataLoading] = useState(false);

    const [messageApi, contextHolder] = message.useMessage();
    const submitAddQuality = async () => {
        try {
            setOpen(false);
        } catch (error) {}
    };

    const confirmAddQuality = async (values, sectionId) => {
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
            fetchQualities(sectionId);
        }
    };
    const confirmDeleteQuality = async (id, sectionId) => {
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
            fetchQualities(sectionId);
        }
    };
    const fetchQualities = async (sectionId) => {
        try {
            //start loading
            setDataLoading(true);
            const { data } = await axios.get("/api/data", {
                params: { sectionId: sectionId, responseId: response_id },
            });
            setQualities(data);
        } catch (error) {
        } finally {
            //finish loading
            setDataLoading(false);
        }
    };
    useEffect(() => {
        // console.log({ qualities });
        // fetchQualities(id);
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
                {/*<Button
                    type="primary"
                    className={styles.button}
                    onClick={() => setOpen(true)}
                    icon={<PlusOutlined />}
                >
                    Tambah Kualitas
                </Button>*/}
                <Spin spinning={DataLoading} tip="Memuat data...">
                    <table className={styles.table}>
                        <thead>
                            <tr className={styles.row}>
                                <td colSpan={7} className={styles.title}>
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
                                <td className={`${styles.data_center}`}>
                                    Satuan
                                </td>
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
                                {/* <td className={`${styles.data_center}`}>
                                    Hapus
                                </td> */}
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
                                {/* <td className={`${styles.data_center}`}>(8)</td> */}
                            </tr>
                        </thead>
                        <tbody>
                            {groups.map((group) => (
                                <React.Fragment key={group.id}>
                                    <tr>
                                        <td
                                            className={styles.group}
                                            colSpan={8}
                                        >
                                            {group.name}
                                        </td>
                                    </tr>
                                    {qualities
                                        .filter(
                                            (quality) =>
                                                quality.commodity.group_id ===
                                                group.id
                                        )
                                        .map((quality) => (
                                            <tr>
                                                <td className={styles.data}>
                                                    {quality.commodity.name}
                                                </td>
                                                <td className={styles.data}>
                                                    {quality.name}
                                                </td>
                                                <td className={styles.data}>
                                                    {quality.satuan}
                                                </td>
                                                <td className={styles.data}>
                                                    {quality.code}
                                                </td>
                                                <td
                                                    className={
                                                        styles.data_right
                                                    }
                                                >
                                                    <RupiahInput
                                                        className={
                                                            styles.form_item
                                                        }
                                                        key={`rupiah-${quality.data_id}`}
                                                        inputName={`${quality.data_id}-price`}
                                                        initialValue={
                                                            quality.price
                                                        }
                                                        min_price={
                                                            quality.min_price
                                                        }
                                                        max_price={
                                                            quality.max_price
                                                        }
                                                    />
                                                </td>
                                                <td
                                                    className={
                                                        styles.data_right
                                                    }
                                                >
                                                    <RupiahInput
                                                        className={
                                                            styles.form_item
                                                        }
                                                        inputName={`${quality.data_id}-price-prev`}
                                                        key={`prev-rupiah-${quality.data_id}`}
                                                        readOnly
                                                        initialValue={
                                                            quality.price_prev
                                                        }
                                                    />
                                                </td>
                                                <td
                                                    className={
                                                        styles.data_right
                                                    }
                                                >
                                                    {
                                                        qualityChanges[
                                                            quality.data_id
                                                        ]
                                                    }
                                                </td>

                                                {/* <td
                                                    className={
                                                        styles.data_center
                                                    }
                                                >
                                                    <Popconfirm
                                                        title="Apakah anda yakin ingin menghapus"
                                                        onConfirm={() =>
                                                            confirmDeleteQuality(
                                                                quality.data_id,
                                                                id
                                                            )
                                                        }
                                                    >
                                                        <DeleteOutlined />
                                                    </Popconfirm>
                                                </td> */}
                                            </tr>
                                        ))}
                                </React.Fragment>
                            ))}
                        </tbody>
                    </table>
                </Spin>
            </div>
        </React.Fragment>
    );
};

export default Section;
