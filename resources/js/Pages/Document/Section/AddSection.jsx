import { render } from "@fullcalendar/core/preact.js";
import { Button, Table } from "antd";
import axios from "axios";
import { useEffect, useState } from "react";
const AddSection = ({ sectionId, confirm }) => {
    const [qualities, setQualities] = useState([]);
    const [loading, setLoading] = useState(false);

    useEffect(() => {
        const fetchQualities = async (sectionId) => {
            setLoading(true);
            try {
                const { data } = await axios.get("/api/qualities", {
                    params: { sectionId: sectionId },
                });
                console.log(data);
                setQualities(data);
            } catch (error) {
                console.error({ error });
            } finally {
                setLoading(false);
            }
        };
        fetchQualities(sectionId);
    }, []);

    // define columns for table
    const columns = [
        {
            title: "Komoditas",
            dataIndex: "commodity_name",
            key: "commodity_name",
        },
        { title: "Kualitas", dataIndex: "quality_name", key: "quality_name" },
        { title: "Satuan", dataIndex: "satuan", key: "satuan" },
        {
            title: "Kode Kualitas",
            dataIndex: "quality_code",
            key: "quality_code",
        },
        {
            title: "Action",
            key: "operation",
            render: (values) => (
                <Button
                    type="primary"
                    onClick={() => confirm(values, sectionId)}
                >
                    Pilih
                </Button>
            ),
        },
    ];
    return <Table columns={columns} dataSource={qualities} loading={loading} />;
};

export default AddSection;
