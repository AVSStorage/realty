import React from "react";
import FormControlLabel from "@material-ui/core/FormControlLabel";
import Checkbox from "@material-ui/core/Checkbox";

export default function LabelWithCheckBox({checked, onChange, name, index, id, services}){
    return (
        <FormControlLabel
            key={index}
            control={
                <Checkbox
                    checked={checked ? true: false}
                    onChange={(evt) => onChange(evt, id, index, services)}
                />
            }
            label={name}
            className="service service-row"
        />
    )
}
