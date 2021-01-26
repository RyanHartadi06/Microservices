import React from "react";
import formatThousand from "src/configs/helpers/formatThousand";
export default function Feature({ data }) {
  return (
    <div className="border border-gray-300 bg-white p-6" style={{ width: 290 }}>
      <div className="flex">
        <div className="w-auto">{data.icon}</div>
        <div className="ml-5">
          <div className="text-gray-600 block">{data.meta}</div>
          <div className="text-gray-900 text-3xl">
            {typeof data.value === "number"
              ? formatThousand(data.value)
              : data?.value}
          </div>
        </div>
      </div>
    </div>
  );
}
