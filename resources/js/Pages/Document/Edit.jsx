import { Form, Tabs } from "antd";
import Blok3 from "./Blok3/Blok3";
import Blok4 from "./Blok4/Blok4";
import Blok5 from "./Blok5/Blok5";
import Tab1 from "./Tab1/Tab1";
import Tab5 from "./Tab5/Tab5";
import Status from "../../components/Status";
import styles from "./Document.module.css";

const blok1 = {
    bulan: "Januari",
    tahun: 2024,
    provinsi: "SULAWESI UTARA",
    kode_provinsi: "71",
    kabkot: "MANADO",
    kode_kabkot: "71",
    kecamatan: "WANEA",
    kode_kecamatan: "031",
};
const blok2 = {
    petugas_nip: "199810132021041002",
    pemeriksa_nip: "199810132021041001",
};

const Coba = ({
    response,
    sample,
    document,
    sections,
    groups,
    commodities,
    qualities,
    selectedQualities,
    previousPrices,
}) => {
    const [form] = Form.useForm();
    console.log({
        response,
        sample,
        document,
        sections,
        groups,
        commodities,
        qualities,
        selectedQualities,
        previousPrices,
    });
    const tabs = [
        {
            key: "1",
            label: "Blok I - II",
            children: <Tab1 blok1={blok1} blok2={blok2} />,
        },
        {
            key: "2",
            label: "Blok III",
            children: <Blok3 />,
        },
        {
            key: "3",
            label: "Blok IV",
            children: <Blok4 />,
        },
        {
            key: "4",
            label: "Blok V",
            children: <Blok5 />,
        },
        {
            key: "5",
            label: "Blok VI-VII",
            children: <Tab5 form={form} />,
        },
    ];
    return (
        <div>
            <Tabs items={tabs} className={styles.body} />
            <Status status="error" />
        </div>
    );
};

export default Coba;
