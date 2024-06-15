import styles from "../Document.module.css";
import BlokTitle from "../../../components/BlokTitle/BlokTitle";
import { DatePicker, Input } from "antd";

const Blok6 = () => {
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
                        <Input readOnly value="Mutiara Mawarni" />
                    </td>

                    <td className={styles.data}>
                        <Input readOnly value="DANUKIDD" />
                    </td>
                </tr>
                <tr className={styles.row}>
                    <td className={styles.data}>1. NIP</td>
                    <td className={styles.data}>
                        <Input readOnly value="123456789012345678" />
                    </td>

                    <td className={styles.data}>
                        <Input readOnly value="123456789012345678" />
                    </td>
                </tr>
                <tr className={styles.row}>
                    <td className={styles.data}>1. Tanggal</td>
                    <td className={styles.data}>
                        <DatePicker />
                    </td>
                    <td className={styles.data}>
                        <DatePicker />
                    </td>
                </tr>
            </tbody>
        </table>
    );
};

export default Blok6;
