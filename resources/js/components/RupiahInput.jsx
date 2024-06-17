import { InputNumber } from "antd";
import styles from "../Pages/Document/Document.module.css";
const RupiahInput = () => {
    return (
        <InputNumber
            className={`w-full ${styles.rupiah_input}`}
            formatter={(value) =>
                `Rp ${value}`.replace(/\B(?=(\d{3})+(?!\d))/g, ",")
            }
            parser={(value) => {
                if (!value) return undefined;
                const parsedValue = Math.round(value.replace(/[^\d]/g, ""));
                return isNaN(parsedValue) ? undefined : parsedValue;
            }}
        />
    );
};

export default RupiahInput;
