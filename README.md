<h1>Magento 2 Pincode Checker With API</h1>
<p>This module is used to check availability of pincode for product. You can add, edit, update and delete pincodes by admin</p>
<p> API is perform whether the pincode is exist in the list </p>

<h1>Installation instructions</h1>
<ul>
  <li>Create a folder {Magento root}/app/code/Mdf/Pincodenurams</li>
  <li>Copy the content of the repository</li>
  <li>Run command: <b>php bin/magento setup:upgrade</b></li>
  <li>Run Command: <b>php bin/magento setup:static-content:deploy<b></li>
  <li>Now Flush Cache: <b>php bin/magento cache:flush<b></li>
</ul>

<h1> API URL </h1>

<p>{{your_url}}<b>/rest/V1/Pincodenurams/custom/me?id=</b>{{your_pincode}}</p>
<p> <b>Response </b> {"error":"","status":1,"id":"2"} </p>

<h1>Preview</h1>
<img src="https://repository-images.githubusercontent.com/331880701/48437480-5d71-11eb-9ed4-10e86583ccad" />

<h2> Arunkumar - <a href="https://www.mssofttech.in/">www.mssofttech.in</a> </h2>
