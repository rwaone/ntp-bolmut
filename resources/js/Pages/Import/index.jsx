import {
    DownloadOutlined,
    InboxOutlined,
    UploadOutlined,
} from "@ant-design/icons";
import { Button, Form, Space, Table, Typography, Upload, message } from "antd";
import * as XLSX from "xlsx";
import { useState } from "react";
const index = () => {
    const [messageApi, contextHolder] = message.useMessage();
    const [columns, setColumns] = useState([]);
    const [dataSource, setDataSource] = useState([]);

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
                return data;
            });
            console.log({ currentData });

            setDataSource(currentData);
            messageApi.success(`${file.name} upload completed`);
        };

        reader.onerror = () => {
            messageApi.error(`${file.name} file reading failed.`);
        };

        reader.readAsArrayBuffer(file);
        return false; // Prevent default upload behavior
    };
    const handleDownload = () => {
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
                "status",
            ],
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
                "status",
            ],
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
                "status",
            ],
        ];

        const workbook = XLSX.utils.book_new();
        const worksheet = XLSX.utils.aoa_to_sheet(data);

        XLSX.utils.book_append_sheet(workbook, worksheet, "respondent");

        XLSX.writeFile(workbook, "template_import.xlsx");
    };
    return (
        <div>
            {contextHolder}
            <Space className="">
                <Button onClick={handleDownload} icon={<DownloadOutlined />}>
                    Unduh Template
                </Button>
                
                        <Upload
                            name="files"
                            beforeUpload={handleFileUpload}
                            accept=".xlsx, .xls"
                        >
                            <Button icon={<UploadOutlined />}>Upload</Button>
                        </Upload>
                
            </Space>
            
            <Typography.Title level={3}>
                Daftar Hasil Ekspor
            </Typography.Title>
            <Table  dataSource={dataSource} columns={columns} />
        </div>
    );
};

export default index;
