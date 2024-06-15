import { Tabs } from "antd";
import Blok3 from "./Document/Blok3/Blok3";
import Blok4 from "./Document/Blok4/Blok4";
import Blok5 from "./Document/Blok5/Blok5";
import Tab1 from "./Document/Tab1/Tab1";
import Tab5 from "./Document/Tab5/Tab5";

const Coba = () => {
    const tabs = [
        {
            key: "1",
            label: "Blok I - II",
            children: <Tab1 />,
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
            label: "Blok VII",
            children: <Tab5 />,
        },
    ];
    return <Tabs items={tabs} />;
};

export default Coba;
