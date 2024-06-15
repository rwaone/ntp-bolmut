import styles from "../Document.module.css";
import BlokTitle from "../../../components/BlokTitle/BlokTitle";
import { Input } from "antd";

const Blok1 = () => {
    return (
        <table className={styles.table}>
            <tbody>
                <tr className={styles.row}>
                    <td colSpan={3} className={styles.title}>
                        I. PENGENALAN TEMPAT DAN PERIODE PENCACAHAN
                    </td>
                </tr>
                <tr className={styles.row}>
                    <td className={styles.data}>1. Bulan & Tahun</td>
                    <td className={styles.data}>Januari</td>
                    <td className={styles.data}>
                        <Input readOnly value={2018} />
                    </td>
                </tr>
                <tr className={styles.row}>
                    <td className={styles.data}>2. Provinsi</td>
                    <td className={styles.data}>ACEH</td>
                    <td className={styles.data}>
                        <Input readOnly value={11} />
                    </td>
                </tr>
                <tr className={styles.row}>
                    <td className={styles.data}>3. Kabupaten</td>
                    <td className={styles.data}>SIMEULUE</td>
                    <td className={styles.data}>
                        <Input readOnly value="01" />
                    </td>
                </tr>
                <tr className={styles.row}>
                    <td className={styles.data}>4. Kabupaten</td>
                    <td className={styles.data}>SIMEULUE TIMUR</td>
                    <td className={styles.data}>
                        <Input readOnly value="020" />
                    </td>
                </tr>
            </tbody>
        </table>
    );
};

export default Blok1;
