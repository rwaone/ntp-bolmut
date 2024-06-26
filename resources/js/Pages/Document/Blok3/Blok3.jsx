import { Button, Space } from "antd";
import styles from "../Document.module.css";
import RowCommodity from "./RowCommodity";
import { useEffect, useState } from "react";
import RupiahInput from "../../../components/RupiahInput";

const Blok3 = () => {
    const [changedCommodities, setChangedCommodities] = useState([]);
    const [loading, setLoading] = useState(false);

    useEffect(() => {
        const dummyData = [
            {
                quality_id: 1,
                commodity_id: 1,
                commodity_name: "Gabah Kering Giling (GKG)",
                quality_name: "Ciherang",
                quality_code: null,
                satuan: "100 Kg",
                group_id: 1,
                id: 1,
                response_id: 1,
                price: 0,
                created_at: "2024-06-21T01:46:46.000000Z",
                updated_at: "2024-06-21T01:46:46.000000Z",
                response: {
                    id: 1,
                    month: "1",
                    year: 2023,
                    document_id: 1,
                    petugas_id: null,
                    enumeration_date: null,
                    pengawas_id: null,
                    review_date: null,
                    sample_id: "9c560d1a-cfc8-42d1-9590-6423a28d3141",
                    commodities: null,
                    notes: null,
                    status: "B",
                    created_by: "1",
                    reviewed_by: null,
                    created_at: "2024-06-21T01:45:28.000000Z",
                    updated_at: "2024-06-21T01:45:28.000000Z",
                    document: {
                        id: 1,
                        type: "HD",
                        code: "HD-1",
                        name: "Survei Harga Produsen Perdesaan Subsektor Tanaman Pangan",
                        created_at: "2024-06-21T01:34:07.000000Z",
                        updated_at: "2024-06-21T01:34:07.000000Z",
                    },
                    petugas: null,
                    sample: {
                        id: "9c560d1a-cfc8-42d1-9590-6423a28d3141",
                        desa_id: 1,
                        document_id: 1,
                        respondent_name: "Uchiha",
                        created_at: "2024-06-21T01:40:11.000000Z",
                        updated_at: "2024-06-21T01:40:11.000000Z",
                        document: {
                            id: 1,
                            type: "HD",
                            code: "HD-1",
                            name: "Survei Harga Produsen Perdesaan Subsektor Tanaman Pangan",
                            created_at: "2024-06-21T01:34:07.000000Z",
                            updated_at: "2024-06-21T01:34:07.000000Z",
                        },
                    },
                },
                quality: {
                    id: 1,
                    code: null,
                    commodity_id: 1,
                    name: "Ciherang",
                    satuan: "100 Kg",
                    min_price: null,
                    max_price: null,
                    status: "digunakan",
                    created_by: null,
                    reviewed_by: null,
                    created_at: "2024-06-21T01:34:08.000000Z",
                    updated_at: "2024-06-21T01:34:08.000000Z",
                    commodity: {
                        id: 1,
                        code: null,
                        group_id: 1,
                        name: "Gabah Kering Giling (GKG)",
                        min_change: null,
                        max_change: null,
                        created_at: "2024-06-21T01:34:07.000000Z",
                        updated_at: "2024-06-21T01:34:07.000000Z",
                        group: {
                            id: 1,
                            section_id: 1,
                            name: "GABAH",
                            created_at: "2024-06-21T01:34:07.000000Z",
                            updated_at: "2024-06-21T01:34:07.000000Z",
                            section: {
                                id: 1,
                                document_id: 1,
                                name: "IV. HARGA YANG DITERIMA PETANI",
                                created_at: "2024-06-21T01:34:07.000000Z",
                                updated_at: "2024-06-21T01:34:07.000000Z",
                                document: {
                                    id: 1,
                                    type: "HD",
                                    code: "HD-1",
                                    name: "Survei Harga Produsen Perdesaan Subsektor Tanaman Pangan",
                                    created_at: "2024-06-21T01:34:07.000000Z",
                                    updated_at: "2024-06-21T01:34:07.000000Z",
                                },
                            },
                        },
                    },
                },
            },
            {
                quality_id: 29,
                commodity_id: 10,
                commodity_name: "Ubi Kayu",
                quality_name: "Pahit",
                quality_code: null,
                satuan: "100 Kg",
                group_id: 2,
                id: 3,
                response_id: 1,
                price: 0,
                created_at: "2024-06-21T02:56:48.000000Z",
                updated_at: "2024-06-21T02:56:48.000000Z",
                response: {
                    id: 1,
                    month: "1",
                    year: 2023,
                    document_id: 1,
                    petugas_id: null,
                    enumeration_date: null,
                    pengawas_id: null,
                    review_date: null,
                    sample_id: "9c560d1a-cfc8-42d1-9590-6423a28d3141",
                    commodities: null,
                    notes: null,
                    status: "B",
                    created_by: "1",
                    reviewed_by: null,
                    created_at: "2024-06-21T01:45:28.000000Z",
                    updated_at: "2024-06-21T01:45:28.000000Z",
                    document: {
                        id: 1,
                        type: "HD",
                        code: "HD-1",
                        name: "Survei Harga Produsen Perdesaan Subsektor Tanaman Pangan",
                        created_at: "2024-06-21T01:34:07.000000Z",
                        updated_at: "2024-06-21T01:34:07.000000Z",
                    },
                    petugas: null,
                    sample: {
                        id: "9c560d1a-cfc8-42d1-9590-6423a28d3141",
                        desa_id: 1,
                        document_id: 1,
                        respondent_name: "Uchiha",
                        created_at: "2024-06-21T01:40:11.000000Z",
                        updated_at: "2024-06-21T01:40:11.000000Z",
                        document: {
                            id: 1,
                            type: "HD",
                            code: "HD-1",
                            name: "Survei Harga Produsen Perdesaan Subsektor Tanaman Pangan",
                            created_at: "2024-06-21T01:34:07.000000Z",
                            updated_at: "2024-06-21T01:34:07.000000Z",
                        },
                    },
                },
                quality: {
                    id: 29,
                    code: null,
                    commodity_id: 10,
                    name: "Pahit",
                    satuan: "100 Kg",
                    min_price: null,
                    max_price: null,
                    status: "digunakan",
                    created_by: null,
                    reviewed_by: null,
                    created_at: "2024-06-21T01:34:08.000000Z",
                    updated_at: "2024-06-21T01:34:08.000000Z",
                    commodity: {
                        id: 10,
                        code: null,
                        group_id: 2,
                        name: "Ubi Kayu",
                        min_change: null,
                        max_change: null,
                        created_at: "2024-06-21T01:34:07.000000Z",
                        updated_at: "2024-06-21T01:34:07.000000Z",
                        group: {
                            id: 2,
                            section_id: 1,
                            name: "PALAWIJA",
                            created_at: "2024-06-21T01:34:07.000000Z",
                            updated_at: "2024-06-21T01:34:07.000000Z",
                            section: {
                                id: 1,
                                document_id: 1,
                                name: "IV. HARGA YANG DITERIMA PETANI",
                                created_at: "2024-06-21T01:34:07.000000Z",
                                updated_at: "2024-06-21T01:34:07.000000Z",
                                document: {
                                    id: 1,
                                    type: "HD",
                                    code: "HD-1",
                                    name: "Survei Harga Produsen Perdesaan Subsektor Tanaman Pangan",
                                    created_at: "2024-06-21T01:34:07.000000Z",
                                    updated_at: "2024-06-21T01:34:07.000000Z",
                                },
                            },
                        },
                    },
                },
            },
            {
                quality_id: 32,
                commodity_id: 11,
                commodity_name: "Ubi Jalar",
                quality_name: "Putih",
                quality_code: null,
                satuan: "100 Kg",
                group_id: 2,
                id: 9,
                response_id: 1,
                price: 0,
                created_at: "2024-06-21T07:36:18.000000Z",
                updated_at: "2024-06-21T07:36:18.000000Z",
                response: {
                    id: 1,
                    month: "1",
                    year: 2023,
                    document_id: 1,
                    petugas_id: null,
                    enumeration_date: null,
                    pengawas_id: null,
                    review_date: null,
                    sample_id: "9c560d1a-cfc8-42d1-9590-6423a28d3141",
                    commodities: null,
                    notes: null,
                    status: "B",
                    created_by: "1",
                    reviewed_by: null,
                    created_at: "2024-06-21T01:45:28.000000Z",
                    updated_at: "2024-06-21T01:45:28.000000Z",
                    document: {
                        id: 1,
                        type: "HD",
                        code: "HD-1",
                        name: "Survei Harga Produsen Perdesaan Subsektor Tanaman Pangan",
                        created_at: "2024-06-21T01:34:07.000000Z",
                        updated_at: "2024-06-21T01:34:07.000000Z",
                    },
                    petugas: null,
                    sample: {
                        id: "9c560d1a-cfc8-42d1-9590-6423a28d3141",
                        desa_id: 1,
                        document_id: 1,
                        respondent_name: "Uchiha",
                        created_at: "2024-06-21T01:40:11.000000Z",
                        updated_at: "2024-06-21T01:40:11.000000Z",
                        document: {
                            id: 1,
                            type: "HD",
                            code: "HD-1",
                            name: "Survei Harga Produsen Perdesaan Subsektor Tanaman Pangan",
                            created_at: "2024-06-21T01:34:07.000000Z",
                            updated_at: "2024-06-21T01:34:07.000000Z",
                        },
                    },
                },
                quality: {
                    id: 32,
                    code: null,
                    commodity_id: 11,
                    name: "Putih",
                    satuan: "100 Kg",
                    min_price: null,
                    max_price: null,
                    status: "digunakan",
                    created_by: null,
                    reviewed_by: null,
                    created_at: "2024-06-21T01:34:08.000000Z",
                    updated_at: "2024-06-21T01:34:08.000000Z",
                    commodity: {
                        id: 11,
                        code: null,
                        group_id: 2,
                        name: "Ubi Jalar",
                        min_change: null,
                        max_change: null,
                        created_at: "2024-06-21T01:34:07.000000Z",
                        updated_at: "2024-06-21T01:34:07.000000Z",
                        group: {
                            id: 2,
                            section_id: 1,
                            name: "PALAWIJA",
                            created_at: "2024-06-21T01:34:07.000000Z",
                            updated_at: "2024-06-21T01:34:07.000000Z",
                            section: {
                                id: 1,
                                document_id: 1,
                                name: "IV. HARGA YANG DITERIMA PETANI",
                                created_at: "2024-06-21T01:34:07.000000Z",
                                updated_at: "2024-06-21T01:34:07.000000Z",
                                document: {
                                    id: 1,
                                    type: "HD",
                                    code: "HD-1",
                                    name: "Survei Harga Produsen Perdesaan Subsektor Tanaman Pangan",
                                    created_at: "2024-06-21T01:34:07.000000Z",
                                    updated_at: "2024-06-21T01:34:07.000000Z",
                                },
                            },
                        },
                    },
                },
            },
        ];
        setChangedCommodities(dummyData);
    }, []);

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
                    changedCommodities.map((quality) => (
                        <tr>
                            <td className={styles.data}>
                                {quality.commodity_name}
                            </td>
                            <td className={styles.data}>
                                {quality.quality_name}
                            </td>
                            <td className={styles.data}>{quality.satuan}</td>
                            <td className={styles.data}>
                                {quality.quality_code}
                            </td>
                            <td className={styles.data_right}>
                                <RupiahInput
                                    className={styles.form_item}
                                    key={`rupiah-${quality.id}`}
                                    inputName={`${quality.id}-price`}
                                    initialValue={quality.price}
                                    readOnly
                                />
                            </td>
                            <td className={styles.data_right}>
                                <RupiahInput
                                    className={styles.form_item}
                                    inputName={`${quality.id}-price-prev`}
                                    key={`prev-rupiah-${quality.id}`}
                                    readOnly
                                    initialValue={0}
                                />
                            </td>
                        </tr>
                    ))}
            </tbody>
        </table>
    );
};

export default Blok3;
