import { Button } from "antd";
import styles from "./Status.module.css";
const colors = {
    error: "danger",
    clean: "succcess",
    warning: "warning",
};
const Status = ({ status }) => {
    const color = colors[status];
    return (
        <Button
            key={color}
            type="primary"
            className={`btn btn-${color}`}
        >{`Dokumen ${status}`}</Button>
    );
};

export default Status;
