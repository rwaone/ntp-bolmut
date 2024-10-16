import {
    ClearOutlined,
    DownloadOutlined,
    InboxOutlined,
    SendOutlined,
    UploadOutlined,
} from "@ant-design/icons";
import {
    Button,
    Form,
    Modal,
    Space,
    Table,
    Typography,
    Upload,
    message,
} from "antd";
import * as XLSX from "xlsx";
import { useState, useEffect } from "react";
import axios from "axios";
import Unduh from "./Unduh";
const index = () => {
    const [messageApi, contextHolder] = message.useMessage();
    const [columns, setColumns] = useState([]);
    const [dataSource, setDataSource] = useState([]);
    const [openUnduhModal, setOpenUnduhModal] = useState(false);

    const [form] = Form.useForm();

    const handleFileUpload = (file) => {
        const reader = new FileReader();

        reader.onload = (e) => {
            const data = new Uint8Array(e.target.result);
            const workbook = XLSX.read(data, { type: "array" });

            // Assuming you want to read the first sheet
            const firstSheetName = workbook.SheetNames[0];
            const worksheet = workbook.Sheets[firstSheetName];
            const jsonData = XLSX.utils.sheet_to_json(worksheet, { header: 1 });
            const currentColumns = jsonData[0].map((row) => ({
                title: row,
                dataIndex: row,
                key: row,
            }));
            currentColumns.push({
                title: "Status Import",
                dataIndex: "_status",
                key: "_status",
            });
            setColumns(currentColumns);
            const formData = jsonData.slice(1);

            // const currentData = formData.map((row) => ({
            //     id: row[0],
            //     sample_id: row[1],
            //     month: row[2],
            //     year: row[3],
            //     document_id: row[4],
            //     petugas_id: row[5],
            //     pengawas_id: row[6],
            //     enumeration_date: row[7],
            //     review_date: row[8],
            //     commodities: row[9],
            //     notes: row[10],
            //     status: row[11],
            // }));
            const currentData = formData.map((row) => {
                let data = {};
                jsonData[0].forEach((column, index) => {
                    data[column] = row[index];
                });
                data["_status"] = "preview";
                return data;
            });
            // console.log({ currentData });

            setDataSource(currentData);
            messageApi.success(`${file.name} upload completed`);
        };

        reader.onerror = () => {
            messageApi.error(`${file.name} file reading failed.`);
        };

        reader.readAsArrayBuffer(file);
        return false; // Prevent default upload behavior
    };

    const handleDownload = (values) => {
        const _data = values.months.map((month) => ({
            sample_id: values.sample_id,
            year: values.year,
            month: month,
            document_id: values.document_id,
            pencacah_id: values.petugas_id,
            pengawas_id: values.pengawas_id,
        }));

        const data = [
            [
                "id",
                "sample_id",
                "month",
                "year",
                "document_id",
                "petugas_id",
                "pengawas_id",
                "enumeration_date",
                "review_date",
                "commodities",
                "notes",
            ],
            ..._data.map((data) => [
                null,
                data.sample_id,
                data.month,
                data.year,
                data.document_id,
                data.pencacah_id,
                data.pengawas_id,
                "yyyy/mm/dd",
                "yyyy/mm/dd",
                "komoditas...",
                "catatan...",
            ]),
        ];

        const workbook = XLSX.utils.book_new();
        const worksheet = XLSX.utils.aoa_to_sheet(data);

        XLSX.utils.book_append_sheet(workbook, worksheet, "respondent");

        // XLSX.writeFile(workbook, "template_import.xlsx");
        const excelBuffer = XLSX.write(workbook, {
            bookType: "xlsx",
            type: "array",
        });

        const blob = new Blob([excelBuffer], {
            type: "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet",
        });

        // Create a URL for the Blob
        const url = URL.createObjectURL(blob);

        const link = document.createElement("a");
        link.href = url;
        link.download = "template.xlsx"; // Use the filename from state
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
        URL.revokeObjectURL(url);
        setOpenUnduhModal(false);
    };
    const handleSend = async (data) => {
        try {
            const response = await axios.post("/import", {responses:data}, {
                headers: { "Content-Type": "application/json" },
            });
            console.log({ response });
            setDataSource(response.data.responses);
        } catch (error) {
            console.error({ error });
        }
    };

    useEffect(() => {
        console.log({ dataSource });
    }, [dataSource]);

    return (
        <div>
            {contextHolder}
            <Typography.Title level={3}>Impor Data CSV/Excel</Typography.Title>
            <Space className="mb-4">
                <Button
                    onClick={() => setOpenUnduhModal(true)}
                    icon={<DownloadOutlined />}
                    type="primary"
                >
                    Unduh Template
                </Button>

                <Upload
                    name="files"
                    beforeUpload={handleFileUpload}
                    accept=".xlsx, .xls"
                    showUploadList={false} // Hide the upload list
                    type="success"
                >
                    <Button icon={<UploadOutlined />}>Upload</Button>
                </Upload>
                <Button
                    icon={<ClearOutlined />}
                    onClick={() => setDataSource([])}
                >
                    Bersihkan Data
                </Button>
                <Button
                    icon={<SendOutlined />}
                    onClick={() => handleSend(dataSource)}
                >
                    Kirim Data
                </Button>
            </Space>

            <Table dataSource={dataSource} columns={columns} />
            <Modal
                open={openUnduhModal}
                title="Generate Template"
                onOk={() => form.submit()}
                onCancel={()=>setOpenUnduhModal(false)}
                onClose={()=>setOpenUnduhModal(false)}
            >
                <Unduh onFinish={handleDownload} form={form} />
            </Modal>
        </div>
    );
};

export default index;
