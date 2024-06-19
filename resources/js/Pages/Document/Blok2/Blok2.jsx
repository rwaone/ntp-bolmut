import SearchInput from "../../../components/SearchInput";
import styles from "../Document.module.css";
import { DatePicker, Form, Input } from "antd";

const Blok2 = ({ petugas_nip, pemeriksa_nip }) => {
    return (
        <table className={styles.table}>
            <tbody>
                <tr className={styles.row}>
                    <td colSpan={3} className={styles.title}>
                        I. KETERANGAN PETUGAS
                    </td>
                </tr>
                <tr className={styles.row}>
                    <td className={styles.data}>1. Nama</td>
                    <td className={styles.data}>
                        <Form.Item name="petugas_nama">
                            <Input readOnly />
                        </Form.Item>
                    </td>

                    <td className={styles.data}>
                        <Form.Item name="pemeriksa_nama">
                            <Input readOnly />
                        </Form.Item>
                    </td>
                </tr>
                <tr className={styles.row}>
                    <td className={styles.data}>1. NIP</td>
                    <td className={styles.data}>
                        <Form.Item>
                            <SearchInput />
                        </Form.Item>
                    </td>

                    <td className={styles.data}>
                        <Form.Item>
                            <SearchInput />
                        </Form.Item>
                    </td>
                </tr>
                <tr className={styles.row}>
                    <td className={styles.data}>1. Tanggal</td>
                    <td className={styles.data}>
                        <Form.Item>
                            <DatePicker />
                        </Form.Item>
                    </td>
                    <td className={styles.data}>
                        <Form.Item>
                            <DatePicker />
                        </Form.Item>
                    </td>
                </tr>
            </tbody>
        </table>
    );
};

export default Blok2;
