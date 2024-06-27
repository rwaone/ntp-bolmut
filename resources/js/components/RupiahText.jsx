import React from "react";
import { Space, Typography } from "antd";
const { Text } = Typography;

const RupiahText = ({ value, color }) => {
    return (
        <Space
            style={{
                // width: "100%",
                textAlign: "right",
                justifyContent: "end",
            }}
        >
            <Text
                style={{
                    color: color,
                    paddingLeft: "11px",
                    paddingRight: "11px",
                }}
            >
                {`Rp ${Number(value) ?? 0}`.replace(
                    /\B(?=(\d{3})+(?!\d))/g,
                    ","
                )}
                {/* {value} */}
            </Text>
        </Space>
    );
};

export default RupiahText;
