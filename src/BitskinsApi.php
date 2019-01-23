<?php

namespace Bitskins;

class BitskinsApi {

    protected $apiKey;
    
    protected $client;

    protected $entrypoint = "https://bitskins.com/api/v1/";

    public function __construct($client, string $apiKey)
    {
        $this->client = $client;
        $this->apiKey = $apiKey;
    }

    /**
     * Get account balance
     * 
     * @see https://bitskins.com/api#get_account_balance
     */
    public function getAccountBalance(string $code)
    {
        $method = 'get_account_balance';

        return $this->request(
            $this->buildEndpoint($method, compact('code'))
        );
    }

    /**
     * Get items prices
     * 
     * @see https://bitskins.com/api#get_all_item_prices
     */
    public function getAllItemPrices(string $code, int $app_id)
    {
        $method = 'get_all_item_prices';

        return $this->request(
            $this->buildEndpoint($method, compact('code', 'app_id'))
        );
    }

    /**
     * Get items prices
     * 
     * @see https://bitskins.com/api#get_price_data_for_items_on_sale
     */
    public function getMarketData(string $code, int $app_id)
    {
        $method = 'get_price_data_for_items_on_sale';

        return $this->request(
            $this->buildEndpoint($method, compact('code', 'app_id'))
        );
    }

    /**
     * Get Account Inventory
     * 
     * @see https://bitskins.com/api#get_my_inventory
     */
    public function getAccountInventory(string $code, int $app_id, int $page = null)
    {
        $method = 'get_my_inventory';

        return $this->request(
            $this->buildEndpoint($method, compact('code', 'app_id', 'page'))
        );
    }
    
    /**
     * Get Inventory on sale
     * 
     * @see https://bitskins.com/api#get_inventory_on_sale
     */
    public function getInventoryOnSale(string $code, int $app_id, int $page = null)
    {
        $method = 'get_inventory_on_sale';

        return $this->request(
            $this->buildEndpoint($method, compact('code', 'app_id', 'page'))
        );
    }

    /**
     * Get Inventory on sale
     * 
     * @see https://bitskins.com/api#get_specific_items_on_sale
     */
    public function getSpecificItemsOnSale(string $code, int $app_id, array $item_ids)
    {
        $method = 'get_specific_items_on_sale';

        return $this->request(
            $this->buildEndpoint($method, compact('code', 'app_id', 'item_ids'))
        );
    }

    /**
     * Get Reset price items
     * 
     * @see https://bitskins.com/api#get_reset_price_items
     */
    public function getResetPriceItems(string $code, int $app_id, int $page = null)
    {
        $method = 'get_reset_price_items';

        return $this->request(
            $this->buildEndpoint($method, compact('code', 'app_id', 'page'))
        );
    }

    /**
     * Get money events
     * 
     * @see https://bitskins.com/api#get_money_events
     */
    public function getMoneyEvents(string $code, int $app_id, int $page = null)
    {
        $method = 'get_money_events';

        return $this->request(
            $this->buildEndpoint($method, compact('code', 'app_id', 'page'))
        );
    }
    
    /**
     * Widthdrawal money
     * 
     * @see https://bitskins.com/api#request_withdrawal
     */
    public function moneyWithdrawal(string $code, int $app_id, int $amount, string $withdrawal_method)
    {
        $method = 'request_withdrawal';

        return $this->request(
            $this->buildEndpoint($method, compact('code', 'app_id', 'amount', 'withdrawal_method'))
        );
    }
    
    /**
     * Buy item
     * 
     * @see https://bitskins.com/api#buy_item
     */
    public function buyItem(string $code, int $app_id, array $item_ids, string $prices, bool $auto_trade = true, bool $allow_trade_delayed_purchases)
    {
        $method = 'buy_item';

        return $this->request(
            $this->buildEndpoint($method, compact(
                'code',
                'app_id',
                'item_ids',
                'prices',
                'allow_trade_delayed_purchases'
                )
            )
        );
    }
  
    /**
     * Sell item
     * 
     * @see https://bitskins.com/api#list_item_for_sale
     */
    public function sellItem(string $code, int $app_id, array $item_ids, array $prices)
    {
        $method = 'list_item_for_sale';

        return $this->request(
            $this->buildEndpoint($method, compact('code', 'app_id', 'item_ids', 'prices'))
        );
    }

    /**
     * Change the price on an item currently on sale
     * 
     * @see https://bitskins.com/api#modify_sale_item
     */
    public function modifySave(string $code, int $app_id, array $item_ids, array $prices)
    {
        $method = 'modify_sale_item';

        return $this->request(
            $this->buildEndpoint($method, compact('code', 'app_id', 'item_ids', 'prices'))
        );
    }
    
    /**
     * Delist an active sale item.
     * 
     * @see https://bitskins.com/api#delist_item
     */
    public function delistItem(string $code, int $app_id, array $item_ids)
    {
        $method = 'delist_item';

        return $this->request(
            $this->buildEndpoint($method, compact('code', 'app_id', 'item_ids'))
        );
    }

    /**
     * Re-list a delisted/purchased item for sale. 
     * Re-listed items can be sold instantly, where applicable.
     * 
     * @see https://bitskins.com/api#relist_item
     */
    public function relistItem(string $code, int $app_id, array $item_ids, array $prices)
    {
        $method = 'delist_item';

        return $this->request(
            $this->buildEndpoint($method, compact('code', 'app_id', 'item_ids', 'prices'))
        );
    }
    
    /**
     * Delist an active sale item and/or re-attempt an item pending withdrawal.
     * 
     * @see https://bitskins.com/api#withdraw_item
     */
    public function widthdrawItem(string $code, int $app_id, array $item_ids)
    {
        $method = 'withdraw_item';

        return $this->request(
            $this->buildEndpoint($method, compact('code', 'app_id', 'item_ids'))
        );
    }
    
    /**
     * Bump items higher for $0.75. Must have 2FA enabled if not logged in.
     * 
     * @see https://bitskins.com/api#bump_item
     */
    public function bumpItem(string $code, int $app_id, array $item_ids)
    {
        $method = 'bump_item';

        return $this->request(
            $this->buildEndpoint($method, compact('code', 'app_id', 'item_ids'))
        );
    }

    /**
     * Retrieve your history of bought items on BitSkins. 
     * Defaults to 30 items per page, with most recent appearing first.
     * 
     * @see https://bitskins.com/api#get_buy_history
     */
    public function getBuyHistory(string $code, int $app_id, int $page = null)
    {
        $method = 'get_buy_history';

        return $this->request(
            $this->buildEndpoint($method, compact('code', 'app_id', 'page'))
        );
    }

    /**
     * Retrieve your history of sold items on BitSkins. 
     * Defaults to 30 items per page, with most recent appearing first.
     * 
     * @see https://bitskins.com/api#get_sell_history
     */
    public function getSellHistory(string $code, int $app_id, int $page = null)
    {
        $method = 'get_sell_history';

        return $this->request(
            $this->buildEndpoint($method, compact('code', 'app_id', 'page'))
        );
    }

    /**
     * Retrieve information about items requested/sent in a given trade from BitSkins. 
     * Trade details will be unretrievable 7 days after the initiation of the trade.
     * 
     * @see https://bitskins.com/api#get_trade_details
     */
    public function getTradeDetails(string $code, int $app_id, string $trade_token, int $trade_id)
    {
        $method = 'get_trade_details';

        return $this->request(
            $this->buildEndpoint($method, compact('code', 'app_id', 'trade_token', 'trade_id'))
        );
    }

    /**
     * Retrieve information about 50 most recent trade offers sent by BitSkins. 
     * Response contains 'steam_trade_offer_state,'which is '2' if the only is currently active.
     * 
     * @see https://bitskins.com/api#get_recent_trade_offers
     */
    public function getRecentTradeOffers(string $code, int $app_id, bool $active_only = null)
    {
        $method = 'get_recent_trade_offers';

        return $this->request(
            $this->buildEndpoint($method, compact('code', 'app_id', 'active_only'))
        );
    }

    /**
     * Retrieve upto 5 pages worth of recent sale data for a given item name. 
     * These are the recent sales for the given item at BitSkins, in descending order.
     * 
     * @see https://bitskins.com/api#get_sales_info
     */
    public function getSalesInfo(string $code, int $app_id, string $market_hash_name, int $page = null)
    {
        $method = 'get_sales_info';

        return $this->request(
            $this->buildEndpoint($method, compact('code', 'app_id', 'market_hash_name', 'page'))
        );
    }
    
    /**
     * Retrieve raw Steam Community Market price data for a given item. 
     * You can use this data to create your own pricing algorithm if you need it.
     * 
     * @see https://bitskins.com/api#get_steam_price_data
     */
    public function getSteamPriceData(string $code, int $app_id, string $market_hash_name)
    {
        $method = 'get_steam_price_data';

        return $this->request(
            $this->buildEndpoint($method, compact('code', 'app_id', 'market_hash_name'))
        );
    }

    /**
     * Create buy order
     * 
     * @see https://bitskins.com/api_market_buy_orders#create_buy_order
     */
    public function createBuyOrder(string $code, int $app_id, string $name, string $price, string $quantity = null)
    {
        $method = 'create_buy_order';

        return $this->request(
            $this->buildEndpoint($method, compact('code', 'app_id', 'name', 'price', 'quantity'))
        );
    }

    /**
     * Retrieve the expected place in queue for a new buy order without creating the buy order.
     * 
     * @see https://bitskins.com/api_market_buy_orders#get_expected_place_in_queue_for_new_buy_order
     */
    public function getExpectedPlaceInQueue(string $code, int $app_id, string $name, string $price)
    {
        $method = 'get_expected_place_in_queue_for_new_buy_order';

        return $this->request(
            $this->buildEndpoint($method, compact('code', 'app_id', 'name', 'price'))
        );
    }

    /**
     * Cancel upto 999 active buy orders.
     * 
     * @see https://bitskins.com/api_market_buy_orders#cancel_buy_orders
     */
    public function cancelBuyOrders(string $code, int $app_id, array $buy_order_ids)
    {
        $method = 'cancel_buy_orders';

        return $this->request(
            $this->buildEndpoint($method, compact('code', 'app_id', 'buy_order_ids'))
        );
    }

    /**
     * Cancel all buy orders for a given item name.
     * 
     * @see https://bitskins.com/api_market_buy_orders#cancel_all_buy_orders
     */
    public function cancelAllBuyOrders(string $code, int $app_id, string $market_hash_name)
    {
        $method = 'cancel_all_buy_orders';

        return $this->request(
            $this->buildEndpoint($method, compact('code', 'app_id', 'market_hash_name'))
        );
    }
    
    /**
     * Retrieve all buy orders you have placed, whether active or not.
     * 
     * @see https://bitskins.com/api_market_buy_orders#get_buy_order_history
     */
    public function getMyBuyOrders(string $code, int $app_id, string $market_hash_name = null, int $page = null, string $type = null)
    {
        $method = 'get_buy_order_history';

        return $this->request(
            $this->buildEndpoint($method, compact('code', 'app_id', 'market_hash_name', 'page', 'type'))
        );
    }
    
    /**
     * Retrieve all market orders by all buyers (except your own) that need fulfillment.
     * 
     * @see https://bitskins.com/api_market_buy_orders#get_market_buy_orders
     */
    public function getMarketBuyOrders(string $code, int $app_id, string $market_hash_name = null, int $page = null)
    {
        $method = 'get_market_buy_orders';

        return $this->request(
            $this->buildEndpoint($method, compact('code', 'app_id', 'market_hash_name', 'page'))
        );
    }

    /**
     * Summary of all market buy orders.
     * Results include your own buy orders, where applicable.
     * 
     * @see https://bitskins.com/api_market_buy_orders#summarize_buy_orders
     */
    public function summarizeBuyOrders(string $code, int $app_id)
    {
        $method = 'summarize_buy_orders';

        return $this->request(
            $this->buildEndpoint($method, compact('code', 'app_id'))
        );
    }

    public function request(string $endpoint)
    {
        $response = $this->client->request('GET', $endpoint);

        return json_decode($response->getBody(), true);
    }

    protected function buildEndpoint(string $method, array $options) : string
    {   
        $options['api_key'] = $this->apiKey;

        $query = http_build_query($options);

        return $this->entrypoint . $method . '/?' . $query;
    }
}