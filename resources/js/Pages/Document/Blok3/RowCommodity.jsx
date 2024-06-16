import { Form, Input, Select } from "antd";
import { useState } from "react";
import styles from "../Document.module.css";
const RowCommodity = ({ key }) => {
    const [komoditas, setKomoditas] = useState([
        { label: "Komoditas 1", value: 1 },
        { label: "Komoditas 2", value: 2 },
    ]);
    const [kualitas, setKualitas] = useState([
        { label: "Kualitas 1", value: 1 },
        { label: "Kualitas 2", value: 2 },
    ]);
    return (
        <tr>
            <td className={`${styles.data} min-w-[300px]`}>
                {key}
                <Form.Item name={`${key}-komoditas`}>
                    <Select
                        options={komoditas}
                        showSearch
                        optionFilterProp="label"
                        className="w-full"
                    />
                </Form.Item>
            </td>

            <td className={`${styles.data} min-w-[300px]`}>
                <Form.Item name={`${key}-kualitas`}>
                    <Select options={kualitas} showSearch className="w-full" />
                </Form.Item>
            </td>

            <td className={styles.data}>
                <Form.Item name={`${key}-satuan`}>
                    <Input />
                </Form.Item>
            </td>

            <td className={styles.data}>
                <Form.Item name={`${key}-kode_kualitas`}>
                    <Input />
                </Form.Item>
            </td>

            <td className={styles.data}>
                <Form.Item name={`${key}-harga_pencacahan`}>
                    <Input />
                </Form.Item>
            </td>

            <td className={styles.data}>
                <Form.Item name={`${key}-harga_sebelumnya`}>
                    <Input />
                </Form.Item>
            </td>
        </tr>
    );
};

export default RowCommodity;
