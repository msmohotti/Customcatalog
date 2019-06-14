# Magento2 Custom Catalog Module
This is a module to create custom catalog, This can do CRUD operations from admin.
API is available to get custom catalog products.

V1/product/getByVPN/{vpn_of_the_product} - This end point returns all products with the VPN provided.

V1/product/update - This end point can update a catalog product. You should add below body in your API request.


    {
      "product": {
        "entity_id":1,
        "product_id":"test_product",
        "copy_write_info":"Test copy write info",
        "vpn":"999"
      }
    }
    



## Manually Installation

Magento2 module installation is very easy, please follow the steps for installation-

Download and unzip the extension zip and create Altayer(vendor) and Customcatalog(module) name folder inside your magento/app/code/ directory and then move all module's files into magento root directory Magento2/app/code/Altayer/Customcatalog/ folder.

## Install with Composer as you go
Specify the version of the module you need, and go.
    
    composer config repositories.reponame vcs https://github.com/msmohotti/Customcatalog
    composer require msmohotti/Customcatalog:master
    

## Run following command via terminal from magento root directory 
  
     $ php bin/magento setup:upgrade
     $ php bin/magento setup:di:compile
     $ php bin/magento setup:static-content:deploy

now module is properly installed