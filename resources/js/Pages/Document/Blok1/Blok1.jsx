import styles from "../Document.module.css";
import BlokTitle from "../../../components/BlokTitle/BlokTitle";
import { Input } from "antd";

const Blok1 = ({
    bulan,
    tahun,
    provinsi,
    kode_provinsi,
    kabkot,
    kode_kabkot,
    kecamatan,
    kode_kecamatan,
}) => {
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
                    <td className={styles.data}>{bulan}</td>
                    <td className={styles.data}>
                        <Input readOnly value={tahun} />
                    </td>
                </tr>
                <tr className={styles.row}>
                    <td className={styles.data}>2. Provinsi</td>
                    <td className={styles.data}>{provinsi}</td>
                    <td className={styles.data}>
                        <Input readOnly value={kode_provinsi} />
                    </td>
                </tr>
                <tr className={styles.row}>
                    <td className={styles.data}>3. Kabupaten</td>
                    <td className={styles.data}>{kabkot}</td>
                    <td className={styles.data}>
                        <Input readOnly value={kode_kabkot} />
                    </td>
                </tr>
                <tr className={styles.row}>
                    <td className={styles.data}>4. Kecamatan</td>
                    <td className={styles.data}>{kecamatan}</td>
                    <td className={styles.data}>
                        <Input readOnly value={kode_kecamatan} />
                    </td>
                </tr>
            </tbody>
        </table>
    );
};

export default Blok1;
