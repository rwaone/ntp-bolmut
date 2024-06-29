import { InputNumber, Form } from "antd";
import styles from "../Pages/Document/Document.module.css";
const RupiahInput = ({ inputName, initialValue, className, readOnly }) => {
    return (
        <Form.Item
            name={inputName}
            initialValue={initialValue ? Math.round(Number(initialValue)) : 0}
            className={className}
        >
            <InputNumber
                className={`w-full ${styles.rupiah_input}`}
                style={{ width: "100%", textAlign: "right" }}
                formatter={(value) =>
                    `Rp ${value}`.replace(/\B(?=(\d{3})+(?!\d))/g, ",")
                }
                readOnly={readOnly ?? false}
                parser={(value) => {
                    if (!value) return undefined;
                    const parsedValue = Math.round(value.replace(/[^\d]/g, ""));
                    return isNaN(parsedValue) ? undefined : parsedValue;
                }}
            />
        </Form.Item>
    );
};

export default RupiahInput;
