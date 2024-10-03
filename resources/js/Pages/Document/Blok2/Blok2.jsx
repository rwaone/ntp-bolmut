import axios from "axios";
import SearchInput from "../../../components/SearchInput";
import styles from "../Document.module.css";
import { DatePicker, Form, Input, Select } from "antd";
import { useEffect, useState } from "react";

const Blok2 = ({ petugas_id, pengawas_id }) => {
    const [daftarPengawas, setDaftarPengawas] = useState([]);
    const [daftarPencacah, setDaftarPencacah] = useState([]);

    useEffect(() => {
        const fetchPetugas = async (jabatan, setData) => {
            try {
                const url = `/api/${jabatan}`;
                const { data } = await axios.get(url);
                // console.log({ data });
                const preparedData = data.map((item) => ({
                    label: item.name,
                    value: item.id,
                }));
                setData(preparedData);
            } catch (error) {
                console.error(error);
            }
        };
        fetchPetugas("pencacah", setDaftarPencacah);
        fetchPetugas("pengawas", setDaftarPengawas);
    }, []);

    return (
        <table className={styles.table}>
            <thead>
                <tr className={styles.row}>
                    <td colSpan={3} className={styles.title}>
                        II. KETERANGAN PETUGAS
                    </td>
                </tr>
                <tr>
                    <th className={styles.data}>Petugas</th>
                    <th className={styles.data}>Pencacah</th>
                    <th className={styles.data}>Pengawas</th>
                </tr>
                <tr>
                    <th className={styles.data}>(1)</th>
                    <th className={styles.data}>(2)</th>
                    <th className={styles.data}>(3)</th>
                </tr>
            </thead>
            <tbody>
                <tr className={styles.row}>
                    <td className={styles.data}>1. Identitas Petugas</td>
                    <td className={styles.data}>
                        <Form.Item
                            name="petugas_id"
                            rules={[
                                {
                                    required: true,
                                    message: "Isian ini harus terisi",
                                },
                            ]}
                        >
                            <Select options={daftarPencacah} allowClear />
                        </Form.Item>
                    </td>

                    <td className={styles.data}>
                        <Form.Item
                            name="pengawas_id"
                            rules={[
                                {
                                    required: true,
                                    message: "Isian ini harus terisi",
                                },
                            ]}
                        >
                            <Select options={daftarPengawas} allowClear />
                        </Form.Item>
                    </td>
                </tr>

                <tr className={styles.row}>
                    <td className={styles.data}>1. Tanggal</td>
                    <td className={styles.data}>
                        <Form.Item
                            name="enumeration_date"
                            rules={[
                                {
                                    required: true,
                                    message: "Isian ini harus terisi",
                                },
                            ]}
                        >
                            <DatePicker />
                        </Form.Item>
                    </td>
                    <td className={styles.data}>
                        <Form.Item
                            name="review_date"
                            rules={[
                                {
                                    required: true,
                                    message: "Isian ini harus terisi",
                                },
                            ]}
                        >
                            <DatePicker />
                        </Form.Item>
                    </td>
                </tr>
            </tbody>
        </table>
    );
};

export default Blok2;
