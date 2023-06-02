import React from "react";
import Header from "../Components/Header";
import { useParams } from "react-router-dom";

const EditAsset = () => {

    const {id} = useParams();

    useEffect(() => {  
        let basicRequest = `http://localhost:8080/asset`;
        console.log(basicRequest);

        axios.get(basicRequest).then(data=> {
                if(data !== undefined){
                    setAssets(data.data)
                }
        })
    }, [])
    
    return (
        <>
        <Header />
        EditAsset
        </>
    );
}

export default EditAsset;