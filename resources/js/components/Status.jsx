import { Button } from "antd";
import styles from "./Status.module.css";
const colors = {
    error: "#cf1322",
    clean: "#389e0d",
    warning: "#d4380d",
};
const Status = ({ status }) => {
    const color = colors[status];
    return (
        <Button
            style={{ backgroundColor: color, marginTop: "15px" }}
            key={color}
            type="primary"
        >{`Dokumen ${status}`}</Button>
    );
};

export default Status;
