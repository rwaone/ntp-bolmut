import { InputNumber, Form } from "antd";
import styles from "../Pages/Document/Document.module.css";
import { useEffect, useState } from "react";
const RupiahInput = ({
    inputName,
    initialValue,
    className,
    readOnly,
    min_price,
    max_price,
}) => {
    const [validate, setValidate] = useState("");
    const [message, setMessage] = useState("");

    useEffect(() => {
        handleChange(initialValue);
    }, [initialValue]);
    const handleChange = (value) => {
        if (value == 0 || value === undefined) {
            setValidate("");
            setMessage("");
            return;
        }
        if (min_price && value < min_price) {
            setValidate("warning");
            setMessage(`Harga minimal adalah ${min_price}`);
            return;
        }
        if (max_price && value > max_price) {
            setValidate("warning");
            setMessage(`Harga maksimal adalah ${max_price}`);
            return;
        }
        setValidate("");
        setMessage("");
        return;
    };

    return (
        <Form.Item
            name={inputName}
            initialValue={initialValue ? Math.round(Number(initialValue)) : 0}
            className={className}
            validateStatus={validate}
            help={message}
        >
            <InputNumber
                className={`w-full ${styles.rupiah_input}`}
                style={{ width: "100%", textAlign: "right" }}
                formatter={(value) =>
                    `Rp ${value}`.replace(/\B(?=(\d{3})+(?!\d))/g, ",")
                }
                readOnly={readOnly ?? false}
                onChange={handleChange}
                parser={(value) => {
                    if (!value) return undefined;

                    const parsedValue = Math.round(value.replace(/[^\d]/g, ""));

                    let parsedFinal = isNaN(parsedValue)
                        ? undefined
                        : parsedValue;
                    return parsedFinal;
                    // console.log({ parsedFinal });
                }}
            />
        </Form.Item>
    );
};

export default RupiahInput;
