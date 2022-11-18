// Write a C program to find square root of a number x.
//If x is not a perfect square then return floor sqrt(x).Don't use sqrt() fun.
#include<stdio.h>
#include<conio.h>
void main()
{
 int num,i,count=0,x=0;
 clrscr();
 printf("\nEnter a Number : ");
 scanf("%d",&num);
 for(i=1;x<=num;i+=2)
 {
  x=x+i;
  count++;
 }
 printf("\nAnswer = %d",count-1);
 getch();
}