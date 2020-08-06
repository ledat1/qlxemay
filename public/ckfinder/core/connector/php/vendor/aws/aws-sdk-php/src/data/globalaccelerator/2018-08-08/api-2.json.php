<?php
// This file was auto-generated from sdk-root/src/data/globalaccelerator/2018-08-08/api-2.json
return [ 'version' => '2.0', 'metadata' => [ 'apiVersion' => '2018-08-08', 'endpointPrefix' => 'globalaccelerator', 'jsonVersion' => '1.1', 'protocol' => 'json', 'serviceFullName' => 'AWS Global Accelerator', 'serviceId' => 'Global Accelerator', 'signatureVersion' => 'v4', 'signingName' => 'globalaccelerator', 'targetPrefix' => 'GlobalAccelerator_V20180706', 'uid' => 'globalaccelerator-2018-08-08', ], 'operations' => [ 'CreateAccelerator' => [ 'name' => 'CreateAccelerator', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'CreateAcceleratorRequest', ], 'output' => [ 'shape' => 'CreateAcceleratorResponse', ], 'errors' => [ [ 'shape' => 'InternalServiceErrorException', ], [ 'shape' => 'InvalidArgumentException', ], [ 'shape' => 'LimitExceededException', ], ], ], 'CreateEndpointGroup' => [ 'name' => 'CreateEndpointGroup', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'CreateEndpointGroupRequest', ], 'output' => [ 'shape' => 'CreateEndpointGroupResponse', ], 'errors' => [ [ 'shape' => 'AcceleratorNotFoundException', ], [ 'shape' => 'EndpointGroupAlreadyExistsException', ], [ 'shape' => 'ListenerNotFoundException', ], [ 'shape' => 'InternalServiceErrorException', ], [ 'shape' => 'InvalidArgumentException', ], [ 'shape' => 'LimitExceededException', ], ], ], 'CreateListener' => [ 'name' => 'CreateListener', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'CreateListenerRequest', ], 'output' => [ 'shape' => 'CreateListenerResponse', ], 'errors' => [ [ 'shape' => 'InvalidArgumentException', ], [ 'shape' => 'AcceleratorNotFoundException', ], [ 'shape' => 'InvalidPortRangeException', ], [ 'shape' => 'InternalServiceErrorException', ], [ 'shape' => 'LimitExceededException', ], ], ], 'DeleteAccelerator' => [ 'name' => 'DeleteAccelerator', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'DeleteAcceleratorRequest', ], 'errors' => [ [ 'shape' => 'AcceleratorNotFoundException', ], [ 'shape' => 'AcceleratorNotDisabledException', ], [ 'shape' => 'AssociatedListenerFoundException', ], [ 'shape' => 'InternalServiceErrorException', ], [ 'shape' => 'InvalidArgumentException', ], ], ], 'DeleteEndpointGroup' => [ 'name' => 'DeleteEndpointGroup', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'DeleteEndpointGroupRequest', ], 'errors' => [ [ 'shape' => 'EndpointGroupNotFoundException', ], [ 'shape' => 'InternalServiceErrorException', ], ], ], 'DeleteListener' => [ 'name' => 'DeleteListener', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'DeleteListenerRequest', ], 'errors' => [ [ 'shape' => 'ListenerNotFoundException', ], [ 'shape' => 'AssociatedEndpointGroupFoundException', ], [ 'shape' => 'InternalServiceErrorException', ], ], ], 'DescribeAccelerator' => [ 'name' => 'DescribeAccelerator', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'DescribeAcceleratorRequest', ], 'output' => [ 'shape' => 'DescribeAcceleratorResponse', ], 'errors' => [ [ 'shape' => 'AcceleratorNotFoundException', ], [ 'shape' => 'InternalServiceErrorException', ], [ 'shape' => 'InvalidArgumentException', ], ], ], 'DescribeAcceleratorAttributes' => [ 'name' => 'DescribeAcceleratorAttributes', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'DescribeAcceleratorAttributesRequest', ], 'output' => [ 'shape' => 'DescribeAcceleratorAttributesResponse', ], 'errors' => [ [ 'shape' => 'AcceleratorNotFoundException', ], [ 'shape' => 'InternalServiceErrorException', ], [ 'shape' => 'InvalidArgumentException', ], ], ], 'DescribeEndpointGroup' => [ 'name' => 'DescribeEndpointGroup', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'DescribeEndpointGroupRequest', ], 'output' => [ 'shape' => 'DescribeEndpointGroupResponse', ], 'errors' => [ [ 'shape' => 'EndpointGroupNotFoundException', ], [ 'shape' => 'InternalServiceErrorException', ], ], ], 'DescribeListener' => [ 'name' => 'DescribeListener', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'DescribeListenerRequest', ], 'output' => [ 'shape' => 'DescribeListenerResponse', ], 'errors' => [ [ 'shape' => 'InvalidArgumentException', ], [ 'shape' => 'ListenerNotFoundException', ], [ 'shape' => 'InternalServiceErrorException', ], ], ], 'ListAccelerators' => [ 'name' => 'ListAccelerators', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'ListAcceleratorsRequest', ], 'output' => [ 'shape' => 'ListAcceleratorsResponse', ], 'errors' => [ [ 'shape' => 'InvalidNextTokenException', ], [ 'shape' => 'InternalServiceErrorException', ], ], ], 'ListEndpointGroups' => [ 'name' => 'ListEndpointGroups', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'ListEndpointGroupsRequest', ], 'output' => [ 'shape' => 'ListEndpointGroupsResponse', ], 'errors' => [ [ 'shape' => 'ListenerNotFoundException', ], [ 'shape' => 'InvalidNextTokenException', ], [ 'shape' => 'InvalidArgumentException', ], [ 'shape' => 'InternalServiceErrorException', ], ], ], 'ListListeners' => [ 'name' => 'ListListeners', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'ListListenersRequest', ], 'output' => [ 'shape' => 'ListListenersResponse', ], 'errors' => [ [ 'shape' => 'AcceleratorNotFoundException', ], [ 'shape' => 'InvalidNextTokenException', ], [ 'shape' => 'InternalServiceErrorException', ], ], ], 'UpdateAccelerator' => [ 'name' => 'UpdateAccelerator', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'UpdateAcceleratorRequest', ], 'output' => [ 'shape' => 'UpdateAcceleratorResponse', ], 'errors' => [ [ 'shape' => 'AcceleratorNotFoundException', ], [ 'shape' => 'InternalServiceErrorException', ], [ 'shape' => 'InvalidArgumentException', ], ], ], 'UpdateAcceleratorAttributes' => [ 'name' => 'UpdateAcceleratorAttributes', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'UpdateAcceleratorAttributesRequest', ], 'output' => [ 'shape' => 'UpdateAcceleratorAttributesResponse', ], 'errors' => [ [ 'shape' => 'AcceleratorNotFoundException', ], [ 'shape' => 'InternalServiceErrorException', ], [ 'shape' => 'InvalidArgumentException', ], ], ], 'UpdateEndpointGroup' => [ 'name' => 'UpdateEndpointGroup', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'UpdateEndpointGroupRequest', ], 'output' => [ 'shape' => 'UpdateEndpointGroupResponse', ], 'errors' => [ [ 'shape' => 'InvalidArgumentException', ], [ 'shape' => 'EndpointGroupNotFoundException', ], [ 'shape' => 'InternalServiceErrorException', ], [ 'shape' => 'LimitExceededException', ], ], ], 'UpdateListener' => [ 'name' => 'UpdateListener', 'http' => [ 'method' => 'POST', 'requestUri' => '/', ], 'input' => [ 'shape' => 'UpdateListenerRequest', ], 'output' => [ 'shape' => 'UpdateListenerResponse', ], 'errors' => [ [ 'shape' => 'InvalidArgumentException', ], [ 'shape' => 'InvalidPortRangeException', ], [ 'shape' => 'ListenerNotFoundException', ], [ 'shape' => 'InternalServiceErrorException', ], [ 'shape' => 'LimitExceededException', ], ], ], ], 'shapes' => [ 'Accelerator' => [ 'type' => 'structure', 'members' => [ 'AcceleratorArn' => [ 'shape' => 'GenericString', ], 'Name' => [ 'shape' => 'GenericString', ], 'IpAddressType' => [ 'shape' => 'IpAddressType', ], 'Enabled' => [ 'shape' => 'GenericBoolean', ], 'IpSets' => [ 'shape' => 'IpSets', ], 'Status' => [ 'shape' => 'AcceleratorStatus', ], 'CreatedTime' => [ 'shape' => 'Timestamp', ], 'LastModifiedTime' => [ 'shape' => 'Timestamp', ], ], ], 'AcceleratorAttributes' => [ 'type' => 'structure', 'members' => [ 'FlowLogsEnabled' => [ 'shape' => 'GenericBoolean', ], 'FlowLogsS3Bucket' => [ 'shape' => 'GenericString', ], 'FlowLogsS3Prefix' => [ 'shape' => 'GenericString', ], ], ], 'AcceleratorNotDisabledException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'ErrorMessage', ], ], 'exception' => true, ], 'AcceleratorNotFoundException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'ErrorMessage', ], ], 'exception' => true, ], 'AcceleratorStatus' => [ 'type' => 'string', 'enum' => [ 'DEPLOYED', 'IN_PROGRESS', ], ], 'Accelerators' => [ 'type' => 'list', 'member' => [ 'shape' => 'Accelerator', ], ], 'AssociatedEndpointGroupFoundException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'ErrorMessage', ], ], 'exception' => true, ], 'AssociatedListenerFoundException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'ErrorMessage', ], ], 'exception' => true, ], 'ClientAffinity' => [ 'type' => 'string', 'enum' => [ 'NONE', 'SOURCE_IP', ], ], 'CreateAcceleratorRequest' => [ 'type' => 'structure', 'required' => [ 'Name', 'IdempotencyToken', ], 'members' => [ 'Name' => [ 'shape' => 'GenericString', ], 'IpAddressType' => [ 'shape' => 'IpAddressType', ], 'Enabled' => [ 'shape' => 'GenericBoolean', ], 'IdempotencyToken' => [ 'shape' => 'IdempotencyToken', ], ], ], 'CreateAcceleratorResponse' => [ 'type' => 'structure', 'members' => [ 'Accelerator' => [ 'shape' => 'Accelerator', ], ], ], 'CreateEndpointGroupRequest' => [ 'type' => 'structure', 'required' => [ 'ListenerArn', 'EndpointGroupRegion', 'IdempotencyToken', ], 'members' => [ 'ListenerArn' => [ 'shape' => 'GenericString', ], 'EndpointGroupRegion' => [ 'shape' => 'GenericString', ], 'EndpointConfigurations' => [ 'shape' => 'EndpointConfigurations', ], 'TrafficDialPercentage' => [ 'shape' => 'TrafficDialPercentage', ], 'HealthCheckPort' => [ 'shape' => 'HealthCheckPort', ], 'HealthCheckProtocol' => [ 'shape' => 'HealthCheckProtocol', ], 'HealthCheckPath' => [ 'shape' => 'GenericString', ], 'HealthCheckIntervalSeconds' => [ 'shape' => 'HealthCheckIntervalSeconds', ], 'ThresholdCount' => [ 'shape' => 'ThresholdCount', ], 'IdempotencyToken' => [ 'shape' => 'IdempotencyToken', ], ], ], 'CreateEndpointGroupResponse' => [ 'type' => 'structure', 'members' => [ 'EndpointGroup' => [ 'shape' => 'EndpointGroup', ], ], ], 'CreateListenerRequest' => [ 'type' => 'structure', 'required' => [ 'AcceleratorArn', 'PortRanges', 'Protocol', 'IdempotencyToken', ], 'members' => [ 'AcceleratorArn' => [ 'shape' => 'GenericString', ], 'PortRanges' => [ 'shape' => 'PortRanges', ], 'Protocol' => [ 'shape' => 'Protocol', ], 'ClientAffinity' => [ 'shape' => 'ClientAffinity', ], 'IdempotencyToken' => [ 'shape' => 'IdempotencyToken', ], ], ], 'CreateListenerResponse' => [ 'type' => 'structure', 'members' => [ 'Listener' => [ 'shape' => 'Listener', ], ], ], 'DeleteAcceleratorRequest' => [ 'type' => 'structure', 'required' => [ 'AcceleratorArn', ], 'members' => [ 'AcceleratorArn' => [ 'shape' => 'GenericString', ], ], ], 'DeleteEndpointGroupRequest' => [ 'type' => 'structure', 'required' => [ 'EndpointGroupArn', ], 'members' => [ 'EndpointGroupArn' => [ 'shape' => 'GenericString', ], ], ], 'DeleteListenerRequest' => [ 'type' => 'structure', 'required' => [ 'ListenerArn', ], 'members' => [ 'ListenerArn' => [ 'shape' => 'GenericString', ], ], ], 'DescribeAcceleratorAttributesRequest' => [ 'type' => 'structure', 'members' => [ 'AcceleratorArn' => [ 'shape' => 'GenericString', ], ], ], 'DescribeAcceleratorAttributesResponse' => [ 'type' => 'structure', 'members' => [ 'AcceleratorAttributes' => [ 'shape' => 'AcceleratorAttributes', ], ], ], 'DescribeAcceleratorRequest' => [ 'type' => 'structure', 'required' => [ 'AcceleratorArn', ], 'members' => [ 'AcceleratorArn' => [ 'shape' => 'GenericString', ], ], ], 'DescribeAcceleratorResponse' => [ 'type' => 'structure', 'members' => [ 'Accelerator' => [ 'shape' => 'Accelerator', ], ], ], 'DescribeEndpointGroupRequest' => [ 'type' => 'structure', 'required' => [ 'EndpointGroupArn', ], 'members' => [ 'EndpointGroupArn' => [ 'shape' => 'GenericString', ], ], ], 'DescribeEndpointGroupResponse' => [ 'type' => 'structure', 'members' => [ 'EndpointGroup' => [ 'shape' => 'EndpointGroup', ], ], ], 'DescribeListenerRequest' => [ 'type' => 'structure', 'required' => [ 'ListenerArn', ], 'members' => [ 'ListenerArn' => [ 'shape' => 'GenericString', ], ], ], 'DescribeListenerResponse' => [ 'type' => 'structure', 'members' => [ 'Listener' => [ 'shape' => 'Listener', ], ], ], 'EndpointConfiguration' => [ 'type' => 'structure', 'members' => [ 'EndpointId' => [ 'shape' => 'GenericString', ], 'Weight' => [ 'shape' => 'EndpointWeight', ], ], ], 'EndpointConfigurations' => [ 'type' => 'list', 'member' => [ 'shape' => 'EndpointConfiguration', ], 'max' => 10, 'min' => 0, ], 'EndpointDescription' => [ 'type' => 'structure', 'members' => [ 'EndpointId' => [ 'shape' => 'GenericString', ], 'Weight' => [ 'shape' => 'EndpointWeight', ], 'HealthState' => [ 'shape' => 'HealthState', ], 'HealthReason' => [ 'shape' => 'GenericString', ], ], ], 'EndpointDescriptions' => [ 'type' => 'list', 'member' => [ 'shape' => 'EndpointDescription', ], ], 'EndpointGroup' => [ 'type' => 'structure', 'members' => [ 'EndpointGroupArn' => [ 'shape' => 'GenericString', ], 'EndpointGroupRegion' => [ 'shape' => 'GenericString', ], 'EndpointDescriptions' => [ 'shape' => 'EndpointDescriptions', ], 'TrafficDialPercentage' => [ 'shape' => 'TrafficDialPercentage', ], 'HealthCheckPort' => [ 'shape' => 'HealthCheckPort', ], 'HealthCheckProtocol' => [ 'shape' => 'HealthCheckProtocol', ], 'HealthCheckPath' => [ 'shape' => 'GenericString', ], 'HealthCheckIntervalSeconds' => [ 'shape' => 'HealthCheckIntervalSeconds', ], 'ThresholdCount' => [ 'shape' => 'ThresholdCount', ], ], ], 'EndpointGroupAlreadyExistsException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'ErrorMessage', ], ], 'exception' => true, ], 'EndpointGroupNotFoundException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'ErrorMessage', ], ], 'exception' => true, ], 'EndpointGroups' => [ 'type' => 'list', 'member' => [ 'shape' => 'EndpointGroup', ], ], 'EndpointWeight' => [ 'type' => 'integer', 'max' => 255, 'min' => 0, ], 'ErrorMessage' => [ 'type' => 'string', ], 'GenericBoolean' => [ 'type' => 'boolean', ], 'GenericString' => [ 'type' => 'string', 'max' => 255, ], 'HealthCheckIntervalSeconds' => [ 'type' => 'integer', 'max' => 30, 'min' => 10, ], 'HealthCheckPort' => [ 'type' => 'integer', 'max' => 65535, 'min' => 1, ], 'HealthCheckProtocol' => [ 'type' => 'string', 'enum' => [ 'TCP', 'HTTP', 'HTTPS', ], ], 'HealthState' => [ 'type' => 'string', 'enum' => [ 'INITIAL', 'HEALTHY', 'UNHEALTHY', ], ], 'IdempotencyToken' => [ 'type' => 'string', 'max' => 255, ], 'InternalServiceErrorException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'ErrorMessage', ], ], 'exception' => true, ], 'InvalidArgumentException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'ErrorMessage', ], ], 'exception' => true, ], 'InvalidNextTokenException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'ErrorMessage', ], ], 'exception' => true, ], 'InvalidPortRangeException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'ErrorMessage', ], ], 'exception' => true, ], 'IpAddress' => [ 'type' => 'string', ], 'IpAddressType' => [ 'type' => 'string', 'enum' => [ 'IPV4', ], ], 'IpAddresses' => [ 'type' => 'list', 'member' => [ 'shape' => 'IpAddress', ], 'max' => 2, 'min' => 0, ], 'IpSet' => [ 'type' => 'structure', 'members' => [ 'IpFamily' => [ 'shape' => 'GenericString', ], 'IpAddresses' => [ 'shape' => 'IpAddresses', ], ], ], 'IpSets' => [ 'type' => 'list', 'member' => [ 'shape' => 'IpSet', ], ], 'LimitExceededException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'ErrorMessage', ], ], 'exception' => true, ], 'ListAcceleratorsRequest' => [ 'type' => 'structure', 'members' => [ 'MaxResults' => [ 'shape' => 'MaxResults', ], 'NextToken' => [ 'shape' => 'GenericString', ], ], ], 'ListAcceleratorsResponse' => [ 'type' => 'structure', 'members' => [ 'Accelerators' => [ 'shape' => 'Accelerators', ], 'NextToken' => [ 'shape' => 'GenericString', ], ], ], 'ListEndpointGroupsRequest' => [ 'type' => 'structure', 'required' => [ 'ListenerArn', ], 'members' => [ 'ListenerArn' => [ 'shape' => 'GenericString', ], 'MaxResults' => [ 'shape' => 'MaxResults', ], 'NextToken' => [ 'shape' => 'GenericString', ], ], ], 'ListEndpointGroupsResponse' => [ 'type' => 'structure', 'members' => [ 'EndpointGroups' => [ 'shape' => 'EndpointGroups', ], 'NextToken' => [ 'shape' => 'GenericString', ], ], ], 'ListListenersRequest' => [ 'type' => 'structure', 'required' => [ 'AcceleratorArn', ], 'members' => [ 'AcceleratorArn' => [ 'shape' => 'GenericString', ], 'MaxResults' => [ 'shape' => 'MaxResults', ], 'NextToken' => [ 'shape' => 'GenericString', ], ], ], 'ListListenersResponse' => [ 'type' => 'structure', 'members' => [ 'Listeners' => [ 'shape' => 'Listeners', ], 'NextToken' => [ 'shape' => 'GenericString', ], ], ], 'Listener' => [ 'type' => 'structure', 'members' => [ 'ListenerArn' => [ 'shape' => 'GenericString', ], 'PortRanges' => [ 'shape' => 'PortRanges', ], 'Protocol' => [ 'shape' => 'Protocol', ], 'ClientAffinity' => [ 'shape' => 'ClientAffinity', ], ], ], 'ListenerNotFoundException' => [ 'type' => 'structure', 'members' => [ 'Message' => [ 'shape' => 'ErrorMessage', ], ], 'exception' => true, ], 'Listeners' => [ 'type' => 'list', 'member' => [ 'shape' => 'Listener', ], ], 'MaxResults' => [ 'type' => 'integer', 'max' => 100, 'min' => 1, ], 'PortNumber' => [ 'type' => 'integer', 'max' => 65535, 'min' => 1, ], 'PortRange' => [ 'type' => 'structure', 'members' => [ 'FromPort' => [ 'shape' => 'PortNumber', ], 'ToPort' => [ 'shape' => 'PortNumber', ], ], ], 'PortRanges' => [ 'type' => 'list', 'member' => [ 'shape' => 'PortRange', ], 'max' => 10, 'min' => 1, ], 'Protocol' => [ 'type' => 'string', 'enum' => [ 'TCP', 'UDP', ], ], 'ThresholdCount' => [ 'type' => 'integer', 'max' => 10, 'min' => 1, ], 'Timestamp' => [ 'type' => 'timestamp', ], 'TrafficDialPercentage' => [ 'type' => 'float', 'max' => 100, 'min' => 0, ], 'UpdateAcceleratorAttributesRequest' => [ 'type' => 'structure', 'members' => [ 'AcceleratorArn' => [ 'shape' => 'GenericString', ], 'FlowLogsEnabled' => [ 'shape' => 'GenericBoolean', ], 'FlowLogsS3Bucket' => [ 'shape' => 'GenericString', ], 'FlowLogsS3Prefix' => [ 'shape' => 'GenericString', ], ], ], 'UpdateAcceleratorAttributesResponse' => [ 'type' => 'structure', 'members' => [ 'AcceleratorAttributes' => [ 'shape' => 'AcceleratorAttributes', ], ], ], 'UpdateAcceleratorRequest' => [ 'type' => 'structure', 'required' => [ 'AcceleratorArn', ], 'members' => [ 'AcceleratorArn' => [ 'shape' => 'GenericString', ], 'Name' => [ 'shape' => 'GenericString', ], 'IpAddressType' => [ 'shape' => 'IpAddressType', ], 'Enabled' => [ 'shape' => 'GenericBoolean', ], ], ], 'UpdateAcceleratorResponse' => [ 'type' => 'structure', 'members' => [ 'Accelerator' => [ 'shape' => 'Accelerator', ], ], ], 'UpdateEndpointGroupRequest' => [ 'type' => 'structure', 'required' => [ 'EndpointGroupArn', ], 'members' => [ 'EndpointGroupArn' => [ 'shape' => 'GenericString', ], 'EndpointConfigurations' => [ 'shape' => 'EndpointConfigurations', ], 'TrafficDialPercentage' => [ 'shape' => 'TrafficDialPercentage', ], 'HealthCheckPort' => [ 'shape' => 'HealthCheckPort', ], 'HealthCheckProtocol' => [ 'shape' => 'HealthCheckProtocol', ], 'HealthCheckPath' => [ 'shape' => 'GenericString', ], 'HealthCheckIntervalSeconds' => [ 'shape' => 'HealthCheckIntervalSeconds', ], 'ThresholdCount' => [ 'shape' => 'ThresholdCount', ], ], ], 'UpdateEndpointGroupResponse' => [ 'type' => 'structure', 'members' => [ 'EndpointGroup' => [ 'shape' => 'EndpointGroup', ], ], ], 'UpdateListenerRequest' => [ 'type' => 'structure', 'required' => [ 'ListenerArn', ], 'members' => [ 'ListenerArn' => [ 'shape' => 'GenericString', ], 'PortRanges' => [ 'shape' => 'PortRanges', ], 'Protocol' => [ 'shape' => 'Protocol', ], 'ClientAffinity' => [ 'shape' => 'ClientAffinity', ], ], ], 'UpdateListenerResponse' => [ 'type' => 'structure', 'members' => [ 'Listener' => [ 'shape' => 'Listener', ], ], ], ],];
