import { Form, Input, Select } from "antd";
import axios from "axios";
import { useEffect, useState } from "react";

const Unduh = ({ onFinish, form }) => {
    const [samples, setSamples] = useState([]);
    const [years, setYears] = useState([]);
    const [months, setMonths] = useState([]);
    const [daftarPencacah, setDaftarPencacah] = useState([]);
    const [daftarPengawas, setDaftarPengawas] = useState([]);

    const generateYears = () => {
        const currentYear = new Date().getFullYear();
        const newYears = [];
        for (let year = currentYear; year > currentYear - 10; year--) {
            newYears.push({
                label: year,
                value: year,
            });
        }
        // console.log({ newYears });
        setYears(newYears);
    };
    const generateMonths = () => {
        const months = Array.from({ length: 12 }, (_, i) => ({
            value: i + 1,
            label: new Date(0, i).toLocaleString("default", { month: "long" }),
        }));
        setMonths(months);
    };

    const fetchSamples = async () => {
        try {
            const response = await axios.get("/master/samples/fetch");
            const response_petugas = await axios.get("/petugas/fetch");
            // const response = await axios.get("/master/samples/fetch");
            const { data } = response;
            const daftar_petugas = response_petugas.data;
            const pencacah = daftar_petugas
                .filter((petugas) => petugas.jabatan == "Pencacah")
                .map((petugas) => ({ label: petugas.name, value: petugas.id }));
            const pengawas = daftar_petugas
                .filter((petugas) => petugas.jabatan == "Pengawas")
                .map((petugas) => ({ label: petugas.name, value: petugas.id }));

            setDaftarPencacah(pencacah);
            setDaftarPengawas(pengawas);
            setSamples(data);
        } catch (error) {
            console.error({ error });
        }
    };

    useEffect(() => {
        generateYears();
        generateMonths();
        fetchSamples();
    }, []);

    return (
        <div>
            <Form form={form} onFinish={onFinish}>
                <Form.Item labelCol={{span:6}} wrapperCol={{span:12}} name="sample_id" label="Sample">
                    <Select
                        options={samples.map((sample) => ({
                            label: sample.respondent_name,
                            value: sample.id,
                        }))}
                        onChange={(value) =>
                            form.setFieldValue(
                                "document_id",
                                samples.filter(
                                    (sample) => sample.id == value
                                )[0].document_id
                            )
                        }
                        showSearch
                        allowClear
                        optionFilterProp="label"
                    />
                </Form.Item>
                <Form.Item labelCol={{span:6}} wrapperCol={{span:12}}
                    hidden
                    name="document_id"
                    label="Jenis Dokumen"
                    showSearch
                    allowClear
                >
                    <Input />
                </Form.Item>
                <Form.Item labelCol={{span:6}} wrapperCol={{span:12}} name="year" label="Tahun">
                    <Select
                        options={years}
                        showSearch
                        allowClear
                        optionFilterProp="label"
                    />
                </Form.Item>
                <Form.Item labelCol={{span:6}} wrapperCol={{span:12}} name="months" label="Bulan">
                    <Select
                        options={months}
                        mode="multiple"
                        showSearch
                        allowClear
                        optionFilterProp="label"
                    />
                </Form.Item>
                <Form.Item labelCol={{span:6}} wrapperCol={{span:12}} name="petugas_id" label="Pencacah">
                    <Select
                        options={daftarPencacah}
                        showSearch
                        allowClear
                        optionFilterProp="label"
                    />
                </Form.Item>
                <Form.Item labelCol={{span:6}} wrapperCol={{span:12}} name="pengawas_id" label="Pengawas">
                    <Select
                        options={daftarPengawas}
                        showSearch
                        allowClear
                        optionFilterProp="label"
                    />
                </Form.Item>
            </Form>
        </div>
    );
};

export default Unduh;
