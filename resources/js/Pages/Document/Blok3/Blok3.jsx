import { Input, Select, Form, Button } from "antd";
import styles from "../Document.module.css";
import RowCommodity from "./RowCommodity";
import { useState } from "react";

const Blok3 = () => {
    const [daftarKomoditas, setDaftarKomoditas] = useState([]);
    const [form] = Form.useForm();
    const addRowCommodity = () => {
        const newCommodity = { value: 2 };
        const newCommodities = [...daftarKomoditas, newCommodity];
        setDaftarKomoditas(newCommodities);
    };
    return (
        <div>
            <Button
                type="primary"
                className={styles.button}
                onClick={addRowCommodity}
            >
                Tambah Komoditas
            </Button>
            <Form form={form}>
                <table className={styles.table}>
                    <thead>
                        <tr className={styles.row}>
                            <td colSpan={6} className={styles.title}>
                                III. RINGKASAN KOMODITAS YANG MENGALAMI
                                PERUBAHAN
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
                        </tr>
                    </thead>
                    <tbody>
                        {daftarKomoditas.map((komoditas, key) => (
                            <RowCommodity key={komoditas} />
                        ))}
                    </tbody>
                </table>
            </Form>
        </div>
    );
};

export default Blok3;
