#include<stdio.h>
int main()
{
int n,r,temp=0,i;
scanf("%d%d",&n,&r);
int a[n];
for(i=0;i<n;i++){
scanf("%d",&a[i]);
}
while(r>0){
temp=a[0];
for(i=n-1;i>0;i--){
a[i-1]=a[i];
if(i==0)
a[n-1]=a[0];
}
r--;
}
for(i=0;i<n;i++){
printf("%d",a[i]);
}}




