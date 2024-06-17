import { Form, Button } from "antd";
import styles from "../Document.module.css";
import { useState } from "react";

import HargaKomoditas from "../../../components/Row/HargaKomoditas";

const Blok4 = () => {
    const [daftarHarga, setDaftarHarga] = useState([]);
    const [form] = Form.useForm();
    const addRowHarga = () => {
        const newHarga = { value: 2 };
        const newharga = [...daftarHarga, newHarga];
        setDaftarHarga(newharga);
    };
    return (
        <div>
            <Button
                type="primary"
                className={styles.button}
                onClick={addRowHarga}
            >
                Tambah Harga
            </Button>
            <Form form={form}>
                <table className={styles.table}>
                    <thead>
                        <tr className={styles.row}>
                            <td colSpan={7} className={styles.title}>
                                IV. HARGA YANG DITERIMA PETANI
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
                        {daftarHarga.map((harga, key) => (
                            <HargaKomoditas key={harga} />
                        ))}
                    </tbody>
                </table>
            </Form>
        </div>
    );
};

export default Blok4;
