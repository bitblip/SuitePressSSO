<?php
/*
 Subscription fullfillment Job Manifest
*/

class SubscriptionFulfillmentJobManifest
{
        /// <summary>
        /// Gets or sets the name of the batch.
        /// </summary>
        /// <value>The name of the batch.</value>
        /// <remarks></remarks>
        var $BatchName;
        /// <summary>
        /// Gets or sets the issue ID.
        /// </summary>
        /// <value>The issue ID.</value>
        /// <remarks></remarks>
        var $IssueID;
        
        /// <summary>
        /// Gets or sets the subscription search to use for fulfillment.
        /// </summary>
        /// <value>The subscription search to use for fulfillment.</value>
        /// <remarks></remarks>
        var $SubscriptionSearchToUseForFulfillment;//Search object
        // and, you can include members
        /// <summary>
        /// Gets or sets the membership search to use for fulfillment.
        /// </summary>
        /// <value>The membership search to use for fulfillment.</value>
        /// <remarks></remarks>
        var $MembershipSearchToUseForFulfillment; // Search Object
}
?>