import styles from "../Document.module.css";
import BlokTitle from "../../../components/BlokTitle/BlokTitle";
import { Form, DatePicker, Input } from "antd";
import TextArea from "antd/es/input/TextArea";

const Blok7 = ({ form }) => {
    return (
        <table className={styles.table}>
            <thead>
                <tr className={styles.row}>
                    <th colSpan={3} className={styles.title}>
                        VII. CATATAN
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr className={styles.row}>
                    <Form.Item name="notes">
                        <TextArea
                            placeholder="Isi Catatan Sesuai Pedoman"
                            allowClear
                        />
                    </Form.Item>
                </tr>
            </tbody>
        </table>
    );
};

export default Blok7;
