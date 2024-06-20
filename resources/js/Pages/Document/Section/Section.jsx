import { Button, Form, Modal } from "antd";
import styles from "../Document.module.css";
import { useState } from "react";

import HargaKomoditas from "../../../components/Row/HargaKomoditas";
import AddSection from "./AddSection";
import RupiahInput from "../../../components/RupiahInput";

const Section = ({ id, title, groups }) => {
    const [qualities, setQualities] = useState([]);
    const [open, setOpen] = useState(false);
    const [confirmLoading, setConfirmLoading] = useState(false);

    const submitAddQuality = async () => {
        try {
            setOpen(false);
        } catch (error) {}
    };
    const confirmAddQuality = (values) => {
        // console.log({ values });
        let newQualities = [...qualities, values];
        setQualities(newQualities);
        console.log({ newQualities });
    };
    return (
        <>
            <Modal
                title="Master Kualitas"
                open={open}
                onOk={submitAddQuality}
                confirmLoading={confirmLoading}
                onCancel={() => setOpen(false)}
                // cancelText={false}
                width={1000}
            >
                <AddSection sectionId={id} confirm={confirmAddQuality} />
            </Modal>
            <div>
                <Button
                    type="primary"
                    className={styles.button}
                    onClick={() => setOpen(true)}
                    icon
                >
                    Tambah Kualitas
                </Button>

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
                        </tr>
                    </thead>
                    <tbody>
                        {groups.map((group) => (
                            <>
                                <tr>
                                    <td className={styles.group} colSpan={7}>
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
                                            <td className={styles.data}>
                                                <Form.Item
                                                    name={`${quality.id}-price`}
                                                >
                                                    <RupiahInput
                                                        key={`rupiah-${quality.id}`}
                                                    />
                                                </Form.Item>
                                            </td>
                                            <td className={styles.data}>
                                                <Form.Item
                                                    name={`${quality.id}-price-prev`}
                                                >
                                                    <RupiahInput
                                                        key={`prev-rupiah-${quality.id}`}
                                                    />
                                                </Form.Item>
                                            </td>
                                        </tr>
                                    ))}
                            </>
                        ))}
                    </tbody>
                </table>
            </div>
        </>
    );
};

export default Section;
