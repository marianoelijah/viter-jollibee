export const getFoodByCategory = (categoryId, dataFood) => {
    let result = [];
  
    dataFood?.data.map((item) => {
      if (Number(categoryId) === Number(item.category_aid)) {
        result.push(item);
      }
     
    });
  
    return result;
  };