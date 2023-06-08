// SPDX-License-Identifier: MIT

pragma solidity >= 0.6.0 < 0.9.0;

contract SimpleStorage{

//basic variable types

    uint256 favouriteNum;
    struct People{
        uint256 age;
        string name;
    }

    People[] public people;

    //mapping is a type of data structure which helps you store and find
    //data more easily.

    mapping(string => uint256) public nametoage;
    function store(uint256 _favNum) public{
        favouriteNum = _favNum;
    }

    function retrieve() public view returns(uint256){
        return favouriteNum;
    }

    function addpeople(string memory _name, uint256 _age) public{ //memory means data only saved during execution
        people.push(People(_age, _name));
        nametoage[_name] = _age;
    }

}
