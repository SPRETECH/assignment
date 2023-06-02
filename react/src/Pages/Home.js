import React, { useEffect, useMemo, useState } from "react";
import Header from "../Components/Header";
const axios = require('axios');
import { useTable } from "react-table";
import _ from "lodash";
import { Link } from "react-router-dom";

const Home = () => {

    const [assets, setAssets] =  useState();
    const tableData = [];

    const tableHeadings = [
        "Name",
        "description",
        "installationYear",
        "expectedUsefulLife",
        "renewableYear",
        "condition",
        "quantity",
        "created by",
        "unitCost",
        "estimatedCost",
        "createdAt",
        "updatedAt",
        "id",
      ];

    useEffect(() => {  
        let basicRequest = `http://localhost:8080/asset`;
        console.log(basicRequest);

        axios.get(basicRequest).then(data=> {
                if(data !== undefined){
                    setAssets(data.data)
                }
        })
    }, [])

    const headings = _.reduce(tableHeadings, (results, heading) => heading === '' ? results : [...results, {
          Header: heading,
          accessor: heading.toLowerCase().replace(" ", "-"),
        }], []);

    if(assets && assets.assets){
        (assets.assets).map((v,k) => {
            tableData.push({
                "name": v.name,
                "description": v.description,
                "installationyear": v.installationYear,
                "expectedusefullife": v.expectedUsefulLife,
                "renewableyear": v.renewableYear,
                "condition": v.condition,
                "quantity": v.quantity,
                "created-by": v.userId,
                "unitcost" : v.unitCost,
                "estimatedcost" : v.estimatedCost,
                "createdat": v.createdAt,
                "updatedat": v.updatedAt,
                "id": v.id,
              });
              return "";
        })
    }
    
    const columns = useMemo(() => [...headings], []);

    return (
        <>
        <Header />
        <Table columns={columns} data={tableData ?? []} />
        </>
    );
}

const Table = ({ columns, data }) => {
    const {
      getTableProps,
      getTableBodyProps,
      headerGroups,
      rows,
      prepareRow,
      allColumns,
      getToggleHideAllColumnsProps,
    } = useTable({
      columns,
      data,
    });
  
    // Render the UI for your table
    return (
      <>
        <div>
          <div className="justify-content-center row">
            {allColumns.map((column) => (
              <label className="ms-2">
                <input inline type="checkbox" {...column.getToggleHiddenProps()} />{" "}
                <span className="ms-2">{column.Header}</span>
              </label>
            ))}
          </div>  
          <br />
        </div>
        <table className="table" {...getTableProps()}>
        <thead>
            {headerGroups.map((headerGroup) => (
              <tr {...headerGroup.getHeaderGroupProps()}>
                {headerGroup.headers.map((column) => (
                    column.id == "id" ?

                    <th>{column.id}</th>
                    :
                    <th {...column.getHeaderProps()}>{column.render("Header")}</th>
                  
                ))}
              </tr>
            ))}
          </thead>
          <tbody {...getTableBodyProps()}>
            {rows.map((row, i) => {
              prepareRow(row);
              return (
                <tr {...row.getRowProps()}>
                  {row.cells.map((cell) => {
                    // console.log(cell)
                    return (
                        cell.column.id == "id" ? 
                        <td>
                            <Link to={{ pathname:'/app/edit-asset/'+cell.value }}>
                                Edit
                            </Link>
                            
                        </td>
                        :   
                        <td {...cell.getCellProps()}>{cell.render("Cell")}</td>
                            
                      );
                  })}
                </tr>
              );

            })}
          </tbody>
        </table>
      </>
    );
  };

export default Home;