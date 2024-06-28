import { Button, Space } from "antd";
import styles from "../Document.module.css";
import RowCommodity from "./RowCommodity";
import { useEffect, useState } from "react";
import RupiahText from "../../../components/RupiahText";

const Blok3 = ({ qualities }) => {
    const [changedQualities, setChangedQualities] = useState([]);
    const [loading, setLoading] = useState(false);

    useEffect(() => {
        const changedQualities = qualities.filter(
            (quality) =>
                quality.price !== quality.price_prev && quality.price > 0
        );
        setChangedQualities(changedQualities);
    }, [qualities]); // Add qualities to the dependency array

    return (
        <table className={styles.table}>
            <thead>
                <tr className={styles.row}>
                    <td colSpan={6} className={styles.title}>
                        III. RINGKASAN KOMODITAS YANG MENGALAMI PERUBAHAN
                    </td>
                </tr>
                <tr>
                    <td className={`${styles.data_center} min-w-[300px]`}>
                        Nama Barang/Jasa
                    </td>
                    <td className={`${styles.data_center} min-w-[300px]`}>
                        Kualitas
                    </td>
                    <td className={`${styles.data_center}`}>Satuan</td>
                    <td className={`${styles.data_center}`}>Kode Kualitas</td>
                    <td className={`${styles.data_center}`}>
                        Harga Bulan Pencacahan (Rp)
                    </td>
                    <td className={`${styles.data_center}`}>
                        Harga Bulan Sebelumnya (Rp)
                    </td>
                </tr>
                <tr>
                    <td className={`${styles.data_center} min-w-[300px]`}>
                        (1)
                    </td>
                    <td className={`${styles.data_center} min-w-[300px]`}>
                        (2)
                    </td>
                    <td className={`${styles.data_center}`}>(3)</td>
                    <td className={`${styles.data_center}`}>(4)</td>
                    <td className={`${styles.data_center}`}>(5)</td>
                    <td className={`${styles.data_center}`}>(6)</td>
                </tr>
            </thead>
            <tbody>
                {!loading &&
                    changedQualities.map((quality) => (
                        <tr>
                            <td className={styles.data}>
                                {quality.commodity.name}
                            </td>
                            <td className={styles.data}>{quality.name}</td>
                            <td className={styles.data}>{quality.satuan}</td>
                            <td className={styles.data}>{quality.code}</td>
                            <td className={styles.data_right}>
                                <RupiahText value={quality.price} />
                            </td>
                            <td className={styles.data_right}>
                                <RupiahText value={quality.price_prev} />
                            </td>
                        </tr>
                    ))}
            </tbody>
        </table>
    );
};

export default Blok3;
