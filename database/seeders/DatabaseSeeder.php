<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(AddressStatesTableSeeder::class);
        $this->call(CitiesTableSeeder::class);
        $this->call(AddressSubRegionTableSeeder::class);
        $this->call(PostcodesTableSeeder::class);
        $this->call(PostOfficesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(CustomerDetailsTableSeeder::class);
        $this->call(AddressesTableSeeder::class);
        $this->call(AddressDetailsTableSeeder::class);
        $this->call(MerchantsTableSeeder::class);
        $this->call(SitesTableSeeder::class);
        $this->call(ProductCategoriesTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(ProductImagesTableSeeder::class);
        $this->call(TransportersTableSeeder::class);
        $this->call(CartStatusesTableSeeder::class);
        $this->call(TripStatusesTableSeeder::class);
        $this->call(WhatsAppPhoneNumbersTableSeeder::class);
        $this->call(TripRejectionReasonsTableSeeder::class);
        $this->call(TripTerminationReasonsTableSeeder::class);
        $this->call(CustomerReferrerPercentsTableSeeder::class);
        $this->call(TransporterReferrerPercentsTableSeeder::class);
        $this->call(AffiliatesTableSeeder::class);
        $this->call(ReferrersTableSeeder::class);

        $this->call(CompaniesTableSeeder::class);
        $this->call(CompanyDetailsTableSeeder::class);

        $this->call(PackagesTableSeeder::class);
        // $this->call(TransporterAccountsTableSeeder::class);
        $this->call(FeesTableSeeder::class);
        $this->call(HeroHeadersTableSeeder::class);
        $this->call(ContactsTableSeeder::class);

        $this->call(AccountsTableSeeder::class);
        $this->call(AccountDetailsTableSeeder::class);

        $this->call(UserRolesTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(RolePermissionsTableSeeder::class);
        $this->call(TransporterFeesTableSeeder::class);
        $this->call(TransporterFeeDetailsTableSeeder::class);
        $this->call(TriggersTableSeeder::class);

        $this->call(AnnouncementTriggersTableSeeder::class);

        $this->call(TasksTableSeeder::class);
        $this->call(AccountDetailItemsTableSeeder::class);
        $this->call(ZonesTableSeeder::class);

        $this->call(PostcodeZonesTableSeeder::class);
        $this->call(PricesTableSeeder::class);
        $this->call(PriceItemsTableSeeder::class);

        $this->call(DriversTableSeeder::class);
        // $this->call(PersonalAccessTokensTableSeeder::class);
        $this->call(TrucksTableSeeder::class);
        $this->call(TruckDetailsTableSeeder::class);
        $this->call(AssignmentsTableSeeder::class);
        $this->call(DocumentsTableSeeder::class);
        // $this->call(AnnouncementsTableSeeder::class);
        // $this->call(NotificationsTableSeeder::class);

        // $this->call(BusinessPricesTableSeeder::class);
        // $this->call(BusinessPriceDetailsTableSeeder::class);
        // $this->call(BusinessPriceDetailWheelsTableSeeder::class);
        // $this->call(BusinessPriceItemsTableSeeder::class);
        // $this->call(BusinessPriceItemDetailsTableSeeder::class);

        $this->call(PurchasesTableSeeder::class);
        // $this->call(BusinessPricePurchasesTableSeeder::class);

        $this->call(RoutesTableSeeder::class);
        $this->call(RouteDetailsTableSeeder::class);

        $this->call(OrdersTableSeeder::class);
        $this->call(OrderDetailsTableSeeder::class);
        $this->call(OrderDelegationsTableSeeder::class);
        $this->call(OrderAmountsTableSeeder::class);
        $this->call(OrderContactsTableSeeder::class);
        $this->call(TransportationFeesTableSeeder::class);

        // $this->call(BusinessPriceOrdersTableSeeder::class);

        $this->call(JobsTableSeeder::class);
        $this->call(JobDetailsTableSeeder::class);

        $this->call(TripsTableSeeder::class);
        $this->call(TripDetailsTableSeeder::class);
        // $this->call(TripLocationsTableSeeder::class);
        // $this->call(TransactionsTableSeeder::class);

        $this->call(CoinPromotionsTableSeeder::class);
        $this->call(CoinPromotionDetailsTableSeeder::class);

        $this->call(CoinsTableSeeder::class);
        // $this->call(DebitsTableSeeder::class);

        // $this->call(CoinRefundsTableSeeder::class);

        $this->call(WhatsAppMessagesTableSeeder::class);
        $this->call(WhatsAppConversationsTableSeeder::class);
        // $this->call(WhatsAppUsersTableSeeder::class);
        // $this->call(TripReasonsTableSeeder::class);
        $this->call(WhatsAppTextsTableSeeder::class);
        // $this->call(CustomerReferrersTableSeeder::class);

        $this->call(DriverDetailsTableSeeder::class);
        // $this->call(PointsTableSeeder::class);
        // $this->call(BillsTableSeeder::class);

        $this->call(WithdrawalStatusesTableSeeder::class);
        $this->call(CustomerAccountStatusesTableSeeder::class);
        $this->call(ReviewsTableSeeder::class);
        $this->call(FavouritesTableSeeder::class);
        $this->call(PinsTableSeeder::class);
        $this->call(CustomerAccountsTableSeeder::class);
        $this->call(ResetTableSeeder::class);
    }
}
