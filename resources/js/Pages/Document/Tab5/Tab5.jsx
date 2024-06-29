import { Form } from "antd";
import Blok6 from "../Blok6/Blok6";
import Blok7 from "../Blok7/Blok7";

const Tab5 = ({ respondent_name, nama_desa }) => {
    return (
        <div className="flex flex-col space-y-6">
            <Blok6 respondent_name={respondent_name} nama_desa={nama_desa} />
            <Blok7 />
        </div>
    );
};

export default Tab5;
