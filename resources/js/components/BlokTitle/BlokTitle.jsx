import styles from "./BlokTitle.module.css";

const BlokTitle = ({ title }) => {
    return <div className={styles.container}>{title}</div>;
};

export default BlokTitle;
