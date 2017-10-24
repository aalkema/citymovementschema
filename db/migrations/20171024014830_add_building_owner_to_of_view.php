<?php


use Phinx\Migration\AbstractMigration;

class AddBuildingOwnerToOfView extends AbstractMigration
{

    public function up()
    {
        $count = $this->execute(
            'ALTER VIEW v_organization_finance
            (Organizationid, BusinessId, BusinessNumber, BusinessSubNumber, CategoryName, CRALegalName, PreferredName, FaithName,
            StatusName, Notes, RegisteredDate, Address, City, Province, PostalCode, AreaSortationCode, PhoneNumber, Year, 
            TotalAssets, TotalLiabilities, TotalDonations, TotalRevenue, BuildingOwner) AS
            SELECT O.OrganizationId, O.BusinessId, O.BusinessNumber, O.BusinessSubNumber, C.CategoryName, O.CRALegalName,
            O.PreferredName, F.FaithName, S.StatusName, O.Notes, O.RegisteredDate, O.Address, O.City, O.Province, O.PostalCode,
            LEFT(O.PostalCode, 3) AS AreaSortationCode, O.PhoneNumber, OF.Year, OF.TotalAssets, OF.TotalLiabilities,
            OF.TotalDonations, OF.TotalRevenue, OF.BuildingOwner
            FROM organization_finance OF
            INNER JOIN organization O ON OF.OrganizationId = O.OrganizationId
            LEFT JOIN category C ON C.CRACategoryId = O.CRACategoryID
            LEFT JOIN faith F ON F.Faithid = O.Faithid
            LEFT JOIN status S ON S.StatusId = O.StatusId'
        );
    }

    public function down()
    {
        $count = $this->execute(
            'CREATE VIEW v_organization_finance
            (Organizationid, BusinessId, BusinessNumber, BusinessSubNumber, CategoryName, CRALegalName, PreferredName, FaithName,
            StatusName, Notes, RegisteredDate, Address, City, Province, PostalCode, AreaSortationCode, PhoneNumber, Year, 
            TotalAssets, TotalLiabilities, TotalDonations, TotalRevenue) AS
            SELECT O.OrganizationId, O.BusinessId, O.BusinessNumber, O.BusinessSubNumber, C.CategoryName, O.CRALegalName,
            O.PreferredName, F.FaithName, S.StatusName, O.Notes, O.RegisteredDate, O.Address, O.City, O.Province, O.PostalCode,
            LEFT(O.PostalCode, 3) AS AreaSortationCode, O.PhoneNumber, OF.Year, OF.TotalAssets, OF.TotalLiabilities,
            OF.TotalDonations, OF.TotalRevenue
            FROM organization_finance OF
            INNER JOIN organization O ON OF.OrganizationId = O.OrganizationId
            LEFT JOIN category C ON C.CRACategoryId = O.CRACategoryID
            LEFT JOIN faith F ON F.Faithid = O.Faithid
            LEFT JOIN status S ON S.StatusId = O.StatusId'
        );
    }
}