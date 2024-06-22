import { Form } from "antd";
import Blok6 from "../Blok6/Blok6";
import Blok7 from "../Blok7/Blok7";

const Tab5 = ({ form }) => {
    const blok6 = {
        respondent_name: "SATIJO",
        desa_name: "BATUAJI",
        komoditas: "SAPI POTONG",
    };
    return (
        <div className="flex flex-col space-y-6">
            <Blok6
                respondent_name={blok6.respondent_name}
                desa_name={blok6.desa_name}
                komoditas={blok6.komoditas}
                form={form}
            />
            <Blok7 />
        </div>
    );
};

export default Tab5;
