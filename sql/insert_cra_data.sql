INSERT INTO organization_finance
SELECT O.OrganizationId
       ,Year
       ,TotalAssets
       ,TotalLiabilities
       ,TotalRevenue
       ,TotalDonations
       ,BuildingOwner
  FROM
     (
      SELECT @row_num := IF(@prev_value=BN,@row_num + 1,1) AS RowNumber
             ,BN
             ,YEAR(FPE) as Year
             , CASE WHEN `4050` = 'Y' THEN 1 ELSE 0 END as BuildingOwner
             ,`4200` as TotalAssets
             ,`4350` as TotalLiabilities
             ,`4500` as TotalDonations
             ,`4700` as TotalRevenue
             ,@prev_value := BN, YEAR(FPE)
        FROM CRAFinance100000ExcelImport,
             (SELECT @row_num := 1) x,
             (SELECT @prev_value := '') y
             WHERE YEAR(FPE) = 2015
       ORDER BY BN DESC
     ) S
INNER JOIN organization O on S.BN = O.BusinessId
WHERE RowNumber = 1