import RupiahInput from "../../../components/RupiahInput";
import styles from "../Document.module.css";
import { Form, Input } from "antd";

const Blok6 = ({ respondent_name, nama_desa, commoditiesRef }) => {
    return (
        <table className={styles.table}>
            <thead>
                <tr className={styles.row}>
                    <th colSpan={3} className={styles.title}>
                        VI. KETERANGAN RESPONDEN
                    </th>
                </tr>
                <tr>
                    <th className={`${styles.data_center}`}>NAMA RESPONDEN</th>
                    <th className={`${styles.data_center}`}>NAMA DESA</th>
                    <th className={`${styles.data_center}`}>
                        JENIS BARANG/KOMODITAS YANG DIHASILKAN
                    </th>
                </tr>
                <tr>
                    <th className={`${styles.data_center}`}>(1)</th>
                    <th className={`${styles.data_center}`}>(2)</th>
                    <th className={`${styles.data_center}`}>(3)</th>
                </tr>
            </thead>
            <tbody>
                <tr className={styles.row}>
                    <td className={styles.data}>{respondent_name}</td>

                    <td className={styles.data}>{nama_desa}</td>
                    <td className={styles.data}>
                        <Form.Item
                            name="commodities"
                            className={styles.form_item}

                            // initialValue={komoditas}
                        >
                            <Input />
                        </Form.Item>
                    </td>
                </tr>
            </tbody>
        </table>
    );
};

export default Blok6;
