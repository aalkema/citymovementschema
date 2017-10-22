/* This script is hard-coded to insert all the required rows into the denomination_denomination_type table
	using data from the DenominationExcelImport table */

INSERT INTO denomination_denomination_type (DenominationId, DenominationTypeId)
(SELECT * FROM(
SELECT DenominationId,
CASE WHEN Evangelical > 0 THEN ('1') END as typeid
FROM DenominationExcelImport
UNION
SELECT DenominationId,
CASE WHEN Anabaptist > 0 THEN ('2') END as typeid
FROM DenominationExcelImport
UNION
SELECT DenominationId,
CASE WHEN Baptist > 0 THEN ('3') END as typeid
FROM DenominationExcelImport
UNION
SELECT DenominationId,
CASE WHEN Holiness > 0 THEN ('4') END as typeid
FROM DenominationExcelImport
UNION
SELECT DenominationId,
CASE WHEN Reformed > 0 THEN ('5') END as typeid
FROM DenominationExcelImport
UNION
SELECT DenominationId,
CASE WHEN Mainline > 0 THEN ('6') END as typeid
FROM DenominationExcelImport
UNION
SELECT DenominationId,
CASE WHEN 'Pentecostal.Charismatic' > 0 THEN ('7') END as typeid
FROM DenominationExcelImport
UNION
SELECT DenominationId,
CASE WHEN Restorationist > 0 THEN ('8') END as typeid
FROM DenominationExcelImport
UNION
SELECT DenominationId,
CASE WHEN Pietist > 0 THEN ('9') END as typeid
FROM DenominationExcelImport
UNION
SELECT DenominationId,
CASE WHEN Anglican_Episcopal > 0 THEN ('10') END as typeid
FROM DenominationExcelImport
UNION
SELECT DenominationId,
CASE WHEN Lutheran > 0 THEN ('11') END as typeid
FROM DenominationExcelImport
UNION
SELECT DenominationId,
CASE WHEN Orthodox > 0 THEN ('12') END as typeid
FROM DenominationExcelImport
UNION
SELECT DenominationId,
CASE WHEN RomanCatholic > 0 THEN ('13') END as typeid
FROM DenominationExcelImport
UNION
SELECT DenominationId,
CASE WHEN 'World.Religions' > 0 THEN ('14') END as typeid
FROM DenominationExcelImport
UNION
SELECT DenominationId,
CASE WHEN Cults > 0 THEN ('16') END as typeid
FROM DenominationExcelImport
ORDER BY DenominationId) t1
WHERE typeid IS NOT NULL);