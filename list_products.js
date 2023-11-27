app.get('/api/products', (req, res) => {
    // Return the list of all products (example data)
    const allProducts = {
        getdrugs: callBack=>{
        pool.query(
            `SELECT drug_id,brand_name,generic_name,sideeffects FROM drug WHERE id = ?`,
            [],
            (error, results, fields) => {
                if(error){
                    return callBack(error);
                }
                return callBack(null, results);
            }
        );
    }};
    res.json(allProducts);
  });
  
  app.get('/api/products/:id', (req, res) => {
    const { id } = req.params;
    // Retrieve product details by id (example data)
    const productDetails = {getdrugById: (id,callBack)=>{
        pool.query(
            `SELECT drug_id,brand_name,generic_name,sideeffects FROM drug WHERE id = ?`,
            [id],
            (error, results, fields) => {
                if(error){
                    return callBack(error);
                } 
                return callBack(null, results[0]);
            }
        );
    }};
    res.json(productDetails);
  });
  
  // Add similar routes for other product-related queries
  