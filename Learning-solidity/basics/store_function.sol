pragma solidity >=0.6.0 < 0.9.0;

contract SimpleStorage{

//basic variable types

    uint256 favouriteNum;

    function store(uint256 _favNum) public{ //public means viewable and accessable, if the type wasn't declared it'll be internal ny default
        favouriteNum = _favNum;
    }

    function retrieve() public view returns(uint256){
        return favouriteNum;
    }
