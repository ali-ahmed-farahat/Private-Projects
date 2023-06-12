// SPDX-License-Identifier: MIT
pragma solidity ^0.8.7;


//we needed to get the version and price ETH -> USD

import "@chainlink/contracts/src/v0.8/interfaces/AggregatorV3Interface.sol";

contract feeddata{

//this function used to get the version of the price feed 

function getversion() public view returns(uint256){
    AggregatorV3Interface feedversion =
         AggregatorV3Interface(0x694AA1769357215DE4FAC081bf1f309aDC325306);
    //this previous address represents Eth to Usd
    return feedversion.version();
}

//this function used to get the price of ETH -> USD

function getprice() public view returns(uint256){
    AggregatorV3Interface feedprice =
         AggregatorV3Interface(0x694AA1769357215DE4FAC081bf1f309aDC325306);
         //this previous address represents Eth to Usd
    (,int256 answer,,,) = feedprice.latestRoundData(); //each empty comma represents a return value from a tupil that we don't need
    return uint256(answer); //as answer is of data type (int256) and the function return (uint256) so we made this tyoecasting
                            //from (int256) -> (uint256)
}
}
