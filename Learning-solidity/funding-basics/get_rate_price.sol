// SPDX-License-Identifier: MIT
pragma solidity ^0.8.7;

import "@chainlink/contracts/src/v0.8/interfaces/AggregatorV3Interface.sol";

contract fundme{

mapping (address => uint256) public addressToValue;


function fund() public payable {

    //if I wanted to make sure that this funding has at least 100$ for example
    uint256 minimum = 100; //set minimum price to 100$

    //making sure that the amount of ether sent is equivalent to more than or = 100 USD
    require(converstionRate(msg.value) >= minimum, "Send more ether");
    
    addressToValue[msg.sender] += msg.value; 
    //we need to know ETH -> USD converstion rate 
}

function getversion() public view returns(uint256){
    AggregatorV3Interface feedversion =
         AggregatorV3Interface(0x694AA1769357215DE4FAC081bf1f309aDC325306);
    //this previous address represents Eth to Usd
    return feedversion.version();
}

function getprice() public view returns(uint256){
    AggregatorV3Interface feedprice =
         AggregatorV3Interface(0x694AA1769357215DE4FAC081bf1f309aDC325306);
    (,int256 answer,,,) = feedprice.latestRoundData();
    return uint256(answer); //if we want to get accurate price and to real price divide by 10**8
}

function converstionRate(uint256 amount) public view returns(uint256){
    uint256 price = getprice(); //get price of 1ETH in USD
    uint rate = amount * price; //amount of eth * price of eth = how much dollars * 10 ** 8
    return rate / 10 ** 8;

}
}
