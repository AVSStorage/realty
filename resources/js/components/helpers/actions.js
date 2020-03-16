export const actions = {
    'UPDATE_DATE_OR_SELECT' : (data, type, dispatch) => {
        dispatch({
                type: 'UPDATE_DATE_OR_SELECT',
                updateProperty: type,
                updatedValue: type === 'guests' ? data.target.value : data
            }
        )
    }
}
