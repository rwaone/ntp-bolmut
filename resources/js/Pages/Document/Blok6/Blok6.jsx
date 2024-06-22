import RupiahInput from "../../../components/RupiahInput";
import styles from "../Document.module.css";
import { Form, Input } from "antd";

const Blok6 = () => {
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
                    <td className={styles.data}>
                        <Form.Item
                            name="respondent_name"
                            className={styles.form_item}

                            // initialValue={respondent_name}
                        >
                            <Input readOnly />
                        </Form.Item>
                    </td>

                    <td className={styles.data}>
                        <Form.Item
                            name="desa_name"
                            className={styles.form_item}

                            // initialValue={desa_name}
                        >
                            <Input readOnly />
                        </Form.Item>
                    </td>
                    <td className={styles.data}>
                        <Form.Item
                            name="komoditas"
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
